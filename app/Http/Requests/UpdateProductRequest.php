<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'stock' => ['sometimes', 'integer', 'min:0'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('validation.attributes.name'),
            'category_id' => __('validation.attributes.category_id'),
            'price' => __('validation.attributes.price'),
            'stock' => __('validation.attributes.stock'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => __('messages.product.name_type'),
            'name.max' => __('messages.product.name_max_length'),
            'category_id.exists' => __('messages.product.category_not_found'),
            'price.numeric' => __('messages.product.price_type'),
            'price.min' => __('messages.product.price_min_value'),
            'stock.integer' => __('messages.product.stock_type'),
            'stock.min' => __('messages.product.stock_min_value'),
        ];
    }
}
