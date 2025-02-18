<?php

namespace App\Services\Discounts;

use App\Models\Order;

class TenPercentDiscount implements DiscountStrategy
{
    private const MINIMUM_AMOUNT = 1000;

    private const DISCOUNT_PERCENTAGE = 0.10;

    private const DISCOUNT_REASON = '10_PERCENT_OVER_1000';

    public function calculate(Order $order): ?array
    {
        if ($order->total < self::MINIMUM_AMOUNT) {
            return null;
        }

        $discountAmount = $order->total * self::DISCOUNT_PERCENTAGE;
        $subtotal = $order->total - $discountAmount;

        return [
            'discountReason' => self::DISCOUNT_REASON,
            'discountAmount' => (float) $discountAmount,
            'subtotal' => (float) $subtotal,
        ];
    }
}
