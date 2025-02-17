<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends BaseApiController
{
    public function __construct(
        private readonly AuthService $authService,
    ) {
    }

    /**
     * Login
     *
     * @unauthenticated
     *
     * @throws ValidationException
     */
    public function login(LoginRequest $request): AuthResource
    {
        return $this->authService->login(
            email: $request->validated('email'),
            password: $request->validated('password'),
        );
    }

    /**
     * Logout
     */
    public function logout(Request $request): void
    {
        $this->authService->logout($request->user());
    }
}
