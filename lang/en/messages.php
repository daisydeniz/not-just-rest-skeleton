<?php

return [
    'product' => [
        'category_required' => 'Category selection is required',
        'category_not_found' => 'Selected category not found',
        'name_required' => 'Product name is required',
        'name_type' => 'Product name must be a string',
        'name_max_length' => 'Product name cannot exceed :max characters',
        'price_required' => 'Product price is required',
        'price_type' => 'Product price must be a numeric value',
        'price_min_value' => 'Product price must be at least :min',
        'stock_required' => 'Product stock quantity is required',
        'stock_type' => 'Product stock quantity must be an integer',
        'stock_min_value' => 'Product stock quantity must be at least :min',
    ],
    'order' => [
        'customer_required' => 'Customer selection is required',
        'customer_not_found' => 'Selected customer not found',
        'items_required' => 'At least one product must be added',
        'items_min' => 'At least one product must be added',
        'item_product_required' => 'Product selection is required',
        'item_product_not_found' => 'Selected product not found',
        'item_quantity_required' => 'Product quantity is required',
        'item_quantity_min' => 'Product quantity must be at least :min',
        'insufficient_stock' => 'Insufficient stock for product :product',
    ],
];
