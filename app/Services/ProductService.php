<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;

class ProductService
{
    /**
     * Retrieve a collection of products along with their associated categories.
     */
    public function getProducts(): Collection
    {
        return Product::with('category')->get();
    }

    /**
     * Create a new product using the provided data.
     *
     * @param array $data The data to create the product with.
     */
    public function createProduct(array $data): Product
    {
        return Product::create($data)->load('category');
    }

    /**
     * Update the specified product with the provided data.
     */
    public function updateProduct(Product $product, array $data): Product
    {
        $product->update($data);

        return $product->fresh(['category']);
    }

    /**
     * Delete the specified product and return the deleted product instance.
     */
    public function deleteProduct(Product $product): Product
    {
        $product->delete();

        return $product;
    }
}
