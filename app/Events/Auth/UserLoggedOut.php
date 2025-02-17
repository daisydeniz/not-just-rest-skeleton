<?php

namespace App\Events\Auth;

use App\Events\BaseEvent;
use App\Models\User;

class UserLoggedOut extends BaseEvent
{
    public function __construct(
        public readonly User $user,
    ) {
    }
}
