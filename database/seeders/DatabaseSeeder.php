<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $roles = collect(RoleEnum::cases())->mapWithKeys(function (RoleEnum $role) {
            $permissions = collect($role->defaultPermissions())
                ->map(fn (string $permission) => Permission::firstOrCreate(['name' => $permission]));

            $roleModel = Role::create([
                'name' => $role->value,
                'description' => $role->description(),
            ]);

            $roleModel->syncPermissions($permissions);

            return [$role->value => $roleModel];
        });

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@foo.bar',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($roles[RoleEnum::ADMIN->value]);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@foo.bar',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($roles[RoleEnum::USER->value]);
    }
}
