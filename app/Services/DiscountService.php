<?php

namespace App\Services;

use App\Http\Resources\DiscountResource;
use App\Models\Order;
use App\Services\Discounts\BuyFiveGetOneDiscount;
use App\Services\Discounts\DiscountStrategy;
use App\Services\Discounts\TenPercentDiscount;
use App\Services\Discounts\TwentyPercentChepest;

class DiscountService
{
    /**
     * @var array|DiscountStrategy[]
     */
    private array $discountStrategies;

    public function __construct()
    {
        $this->discountStrategies = [
            new BuyFiveGetOneDiscount(),
            new TwentyPercentChepest(),
            new TenPercentDiscount(),
        ];
    }

    public function calculateDiscounts(Order $order): DiscountResource
    {
        $order->load(['customer', 'items.product']);
        $discounts = [];
        $totalDiscount = 0;
        foreach ($this->discountStrategies as $strategy) {
            $discount = $strategy->calculate($order);

            if ($discount !== null) {
                $discounts[] = $discount;
                $totalDiscount = $discount['discountAmount'];
            }
        }

        return new DiscountResource([
            'id' => $order->id,
            'discounts' => $discounts,
            'totalDiscount' => $totalDiscount,
            'discountedTotal' => $order->total - $totalDiscount,
        ]);
    }
}
