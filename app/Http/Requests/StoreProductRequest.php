<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
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
            'category_id.required' => __('messages.product.category_required'),
            'category_id.exists' => __('messages.product.category_not_found'),
            'name.required' => __('messages.product.name_required'),
            'name.max' => __('messages.product.name_max_length'),
            'price.required' => __('messages.product.price_required'),
            'price.min' => __('messages.product.price_min_value'),
            'stock.required' => __('messages.product.stock_required'),
            'stock.min' => __('messages.product.stock_min_value'),
        ];
    }
}
