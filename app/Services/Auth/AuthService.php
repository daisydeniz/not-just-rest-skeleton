<?php

namespace App\Services\Auth;

use App\Events\Auth\UserLoggedIn;
use App\Events\Auth\UserLoggedOut;
use App\Http\Resources\Auth\AuthResource;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService extends BaseService
{
    /**
     *  login user, create token and dispatches UserLoggedIn event
     *
     * @throws ValidationException
     */
    public function login(string $email, string $password): AuthResource
    {
        $user = User::where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')],
            ]);
        }

        $token = $user->createToken($user->id)->plainTextToken;

        UserLoggedIn::dispatch($user);

        return (new AuthResource($user))->setToken($token);
    }

    /**
     * Logout user and dispatch UserLoggedOut event
     */
    public function logout(User $user): void
    {
        $user->currentAccessToken()->delete();

        UserLoggedOut::dispatch($user);
    }
}
