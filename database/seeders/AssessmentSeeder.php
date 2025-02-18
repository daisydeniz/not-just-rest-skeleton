<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        $categoriesData = [
            [
                'id' => 1,
                'name' => 'El Aletleri',
                'slug' => Str::slug('El Aletleri'),
            ],
            [
                'id' => 2,
                'name' => 'Elektrik',
                'slug' => Str::slug('Elektrik'),
            ],
        ];

        $customersData = [
            [
                'id' => 1,
                'name' => 'Türker Jöntürk',
                'since' => '2014-06-28',
                'revenue' => '492.12',
            ],
            [
                'id' => 2,
                'name' => 'Kaptan Devopuz',
                'since' => '2015-01-15',
                'revenue' => '1505.95',
            ],
            [
                'id' => 3,
                'name' => 'İsa Sonuyumaz',
                'since' => '2016-02-11',
                'revenue' => '0.00',
            ],
        ];

        $productsData = [
            [
                'id' => 100,
                'name' => 'Black&Decker A7062 40 Parça Cırcırlı Tornavida Seti',
                'category_id' => 1,
                'price' => '120.75',
                'stock' => 10,
            ],
            [
                'id' => 101,
                'name' => "Reko Mini Tamir Hassas Tornavida Seti 32'li",
                'category_id' => 1,
                'price' => '49.50',
                'stock' => 10,
            ],
            [
                'id' => 102,
                'name' => 'Viko Karre Anahtar - Beyaz',
                'category_id' => 2,
                'price' => '11.28',
                'stock' => 10,
            ],
            [
                'id' => 103,
                'name' => 'Legrand Salbei Anahtar, Alüminyum',
                'category_id' => 2,
                'price' => '22.80',
                'stock' => 10,
            ],
            [
                'id' => 104,
                'name' => 'Schneider Asfora Beyaz Komütatör',
                'category_id' => 2,
                'price' => '12.95',
                'stock' => 10,
            ],
        ];

        $ordersData = [
            [
                'id' => 1,
                'customer_id' => 1,
                'items' => [
                    [
                        'product_id' => 102,
                        'quantity' => 10,
                        'unit_price' => '11.28',
                        'total' => '112.80',
                    ],
                ],
                'total' => '112.80',
            ],
            [
                'id' => 2,
                'customer_id' => 2,
                'items' => [
                    [
                        'product_id' => 101,
                        'quantity' => 2,
                        'unit_price' => '49.50',
                        'total' => '99.00',
                    ],
                    [
                        'product_id' => 100,
                        'quantity' => 1,
                        'unit_price' => '120.75',
                        'total' => '120.75',
                    ],
                ],
                'total' => '219.75',
            ],
            [
                'id' => 3,
                'customer_id' => 3,
                'items' => [
                    [
                        'product_id' => 102,
                        'quantity' => 6,
                        'unit_price' => '11.28',
                        'total' => '67.68',
                    ],
                    [
                        'product_id' => 100,
                        'quantity' => 10,
                        'unit_price' => '120.75',
                        'total' => '1207.50',
                    ],
                ],
                'total' => '1275.18',
            ],
        ];

        // Insert categories
        foreach ($categoriesData as $category) {
            Category::create($category);
        }

        // Insert customers
        foreach ($customersData as $customer) {
            Customer::create($customer);
        }

        // Insert products
        foreach ($productsData as $product) {
            Product::create($product);
        }

        // Insert orders and order items
        foreach ($ordersData as $orderData) {
            $items = $orderData['items'];
            unset($orderData['items']);

            $order = Order::create($orderData);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total' => $item['total'],
                ]);
            }
        }
    }
}
