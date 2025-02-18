<?php

namespace App\Services\Discounts;

use App\Models\Order;

class BuyFiveGetOneDiscount implements DiscountStrategy
{
    private const CATEGORY_ID = 2;

    private const ITEMS_NEEDED = 6;

    private const DISCOUNT_REASON = 'BUY_5_GET_1';

    public function calculate(Order $order): ?array
    {
        $categoryItems = $order->items->filter(function ($item) {
            return $item->product->category_id === self::CATEGORY_ID;
        });

        if ($categoryItems->isEmpty()) {
            return null;
        }

        $discountAmount = 0;
        $subtotal = $order->total;

        foreach ($categoryItems->groupBy('product_id') as $productItems) {
            $quantity = $productItems->sum('quantity');

            if ($quantity >= self::ITEMS_NEEDED) {
                $itemDiscount = $productItems->first()->unit_price;
                $discountAmount = $itemDiscount;
                $subtotal = $subtotal - $itemDiscount;
            }
        }

        if ($discountAmount === 0) {
            return null;
        }

        return [
            'discountReason' => self::DISCOUNT_REASON,
            'discountAmount' => (float)$discountAmount,
            'subtotal' => (float) $subtotal,
        ];
    }
}
