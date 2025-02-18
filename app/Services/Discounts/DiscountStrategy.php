<?php

namespace App\Services\Discounts;

use App\Models\Order;

interface DiscountStrategy
{
    /**
     * Calculate discount for the given order
     */
    public function calculate(Order $order): ?array;
}
