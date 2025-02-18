<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin array{
 *    id: int,
 *    customer: mixed,
 *    items: mixed,
 *    total: float,
 *    discounts: array,
 *    total_discount: float,
 *    discounted_total: float,
 *    created_at: string,
 *    updated_at: string
 * }
 */
class DiscountResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $discounts = array_map(function ($discount) {
            return [
                'discountReason' => $discount['discountReason'],
                'discountAmount' => (float)number_format($discount['discountAmount'], 2, '.', ''),
                'subtotal' => (float)number_format($discount['subtotal'], 2, '.', ''),
            ];
        }, $this['discounts']);

        return [
            'orderId' => $this['id'],
            'discounts' => $discounts,
            'totalDiscount' => (float)number_format($this['totalDiscount'], 2, '.', ''),
            'discountedTotal' => (float)number_format($this['discountedTotal'], 2, '.', ''),
        ];
    }
}
