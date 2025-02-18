<?php

namespace App\Services\Discounts;

use App\Models\Order;

class TwentyPercentChepest implements DiscountStrategy
{
    private const CATEGORY_ID = 1;

    private const MIN_ITEMS = 2;

    private const DISCOUNT_PERCENTAGE = 0.20;

    private const DISCOUNT_REASON = '20_PERCENT_OFF_CATEGORY_1';

    public function calculate(Order $order): ?array
    {
        $categoryItems = $order->items->filter(function ($item) {
            return $item->product->category_id === self::CATEGORY_ID;
        });

        if ($categoryItems->count() < self::MIN_ITEMS) {
            return null;
        }

        $cheapestItem = $order->items->sortBy('unit_price')->first();
        $discountAmount = $cheapestItem->unit_price * self::DISCOUNT_PERCENTAGE;
        $subtotal = $order->total - $discountAmount;

        return [
            'discountReason' => self::DISCOUNT_REASON,
            'discountAmount' => (float)$discountAmount,
            'subtotal' => (float)$subtotal,
        ];
    }
}
