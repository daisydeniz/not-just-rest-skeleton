<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService
    ) {
    }

    /**
     * List
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection($this->productService->getProducts());
    }

    /**
     * Create
     */
    public function store(StoreProductRequest $request): ProductResource
    {
        return new ProductResource(
            $this->productService->createProduct($request->validated())
        );
    }

    /**
     * Show
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     * Update
     */
    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        return new ProductResource(
            $this->productService->updateProduct($product, $request->validated())
        );
    }

    /**
     * Delete
     */
    public function destroy(Product $product): ProductResource
    {
        return new ProductResource(
            $this->productService->deleteProduct($product)
        );
    }
}
