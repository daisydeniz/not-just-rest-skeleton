<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OrderService extends BaseService
{
    /**
     * Retrieves orders.
     *
     */
    public function getOrders(): Collection
    {
        return Order::with(['items.product', 'customer'])->get();
    }

    /**
     * Handles the creation of a new order within transaction  by processing the provided data,
     */
    public function createOrder(array $data): Order
    {
        return DB::transaction(function () use ($data) {

            [$orderItems, $orderTotal] = $this->processOrderItems($data['items']);

            $order = Order::create([
                'customer_id' => $data['customer_id'],
                'total' => $orderTotal,
            ]);

            $order->items()->createMany($orderItems);

            return $order->load('items.product');
        });
    }

    /**
     * Process order items: validate stock, calculate totals, and prepare items array.
     *
     * @return array [array $orderItems, float $orderTotal]
     *
     * @throws \Exception
     */
    private function processOrderItems(array $items): array
    {
        $orderTotal = 0;
        $orderItems = [];

        foreach ($items as $item) {
            $product = Product::find($item['product_id']);
            if (! $product || $product->stock < $item['quantity']) {
                throw new \Exception("Insufficient stock for product {$product->name}");
            }

            $itemTotal = $product->price * $item['quantity'];
            $orderTotal += $itemTotal;

            $orderItems[] = [
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'unit_price' => $product->price,
                'total' => $itemTotal,
            ];

            $product->decrement('stock', $item['quantity']);
        }

        return [$orderItems, $orderTotal];
    }

    /**
     * Deletes the specified order from the database.
     *
     * @param Order $order The order instance to be deleted.
     *
     * @return Order The deleted order instance.
     */
    public function deleteOrder(Order $order): Order
    {
        $order->delete();

        return $order;
    }
}
