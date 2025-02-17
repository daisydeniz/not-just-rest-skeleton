<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    /**
     * Me
     *
     * return authenticated user
     */
    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}
