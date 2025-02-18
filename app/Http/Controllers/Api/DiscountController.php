<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiscountResource;
use App\Models\Order;
use App\Services\DiscountService;

class DiscountController extends Controller
{
    public function __construct(
        private readonly DiscountService $discountService
    ) {
    }

    /**
     * Calculate
     */
    public function calculateOrderDiscount(Order $order): DiscountResource
    {
        return $this->discountService->calculateDiscounts($order);
    }
}
