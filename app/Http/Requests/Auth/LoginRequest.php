<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            /**
             * email
             * user@example.com
             */
            'email' => ['required', 'email'],
            /**
             *password
             * 123456
             */
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('auth.validation.email.required'),
            'email.email' => __('auth.validation.email.email'),
            'password.required' => __('auth.validation.password.required'),
        ];
    }
}
