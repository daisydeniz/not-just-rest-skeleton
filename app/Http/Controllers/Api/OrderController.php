<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderService $orderService
    ) {}

    /**
     * List
     */
    public function index(): AnonymousResourceCollection
    {
        return OrderResource::collection($this->orderService->getOrders());
    }

    /**
     * Create
     */
    public function store(StoreOrderRequest $request): OrderResource
    {
        try {
            $order = $this->orderService->createOrder($request->validated());

            return new OrderResource($order);
        } catch (\Exception $e) {
            abort(422, $e->getMessage());
        }
    }

    /**
     * Delete
     */
    public function destroy(Order $order): OrderResource
    {
        return new OrderResource($this->orderService->deleteOrder($order));
    }
}
