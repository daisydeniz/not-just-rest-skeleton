<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    public function defaultPermissions(): array
    {
        return [
            'viewAny',
        ];
    }
    public function description(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::USER => 'User',
        };
    }
}
