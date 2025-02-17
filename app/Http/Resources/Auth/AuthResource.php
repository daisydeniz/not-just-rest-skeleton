<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    private string $token;

    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function toArray(Request $request): array
    {
        return [
            'data' => new UserResource($this->resource),
            'meta' => [
                'token' => $this->token ?? null,
                'token_type' => 'Bearer',
            ],
        ];
    }
}
