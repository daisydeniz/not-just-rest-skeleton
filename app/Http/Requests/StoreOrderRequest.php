<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function attributes(): array
    {
        return [
            'customer_id' => __('validation.attributes.customer_id'),
            'items' => __('validation.attributes.items'),
            'items.*.product_id' => __('validation.attributes.product_id'),
            'items.*.quantity' => __('validation.attributes.quantity'),
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => __('messages.order.customer_required'),
            'customer_id.exists' => __('messages.order.customer_not_found'),
            'items.required' => __('messages.order.items_required'),
            'items.min' => __('messages.order.items_min'),
            'items.*.product_id.required' => __('messages.order.item_product_required'),
            'items.*.product_id.exists' => __('messages.order.item_product_not_found'),
            'items.*.quantity.required' => __('messages.order.item_quantity_required'),
            'items.*.quantity.min' => __('messages.order.item_quantity_min'),
        ];
    }
}
