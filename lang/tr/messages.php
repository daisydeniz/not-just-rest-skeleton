<?php

return [
    'product' => [
        'category_required' => 'Kategori seçimi zorunludur',
        'category_not_found' => 'Seçilen kategori bulunamadı',
        'name_required' => 'Ürün adı zorunludur',
        'name_type' => 'Ürün adı metin olmalıdır',
        'name_max_length' => 'Ürün adı en fazla :max karakter olabilir',
        'price_required' => 'Ürün fiyatı zorunludur',
        'price_type' => 'Ürün fiyatı sayısal bir değer olmalıdır',
        'price_min_value' => 'Ürün fiyatı en az :min olabilir',
        'stock_required' => 'Ürün stok miktarı zorunludur',
        'stock_type' => 'Ürün stok miktarı tam sayı olmalıdır',
        'stock_min_value' => 'Ürün stok miktarı en az :min olabilir',
    ],
    'order' => [
        'customer_required' => 'Müşteri seçimi zorunludur',
        'customer_not_found' => 'Seçilen müşteri bulunamadı',
        'items_required' => 'En az bir ürün eklemelisiniz',
        'items_min' => 'En az bir ürün eklemelisiniz',
        'item_product_required' => 'Ürün seçimi zorunludur',
        'item_product_not_found' => 'Seçilen ürün bulunamadı',
        'item_quantity_required' => 'Ürün miktarı zorunludur',
        'item_quantity_min' => 'Ürün miktarı en az :min olmalıdır',
        'insufficient_stock' => ':product ürünü için yeterli stok bulunmamaktadır',
    ],
];
