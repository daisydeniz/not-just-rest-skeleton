<?php

return [
    'attributes' => [
        'name' => 'name',
        'category_id' => 'category',
        'price' => 'price',
        'stock' => 'stock',
        'customer_id' => 'customer',
        'items' => 'items',
        'product_id' => 'product',
        'quantity' => 'quantity',
    ],

    'custom' => [
        'product' => [
            'category_id' => [
                'required' => 'product_category_required',
                'exists' => 'product_category_not_found',
            ],
            'name' => [
                'required' => 'product_name_required',
                'max' => 'product_name_max_length',
            ],
            'price' => [
                'required' => 'product_price_required',
                'min' => 'product_price_min_value',
            ],
            'stock' => [
                'required' => 'product_stock_required',
                'min' => 'product_stock_min_value',
            ],
        ],
    ],
];
