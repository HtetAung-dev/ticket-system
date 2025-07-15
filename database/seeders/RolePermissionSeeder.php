<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view dashboard',
            'manage users',
            'manage roles',
            'manage permissions',
            'manage settings',
            'manage tickets',
            'manage assignee',
            'access ticket'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $manager = Role::create(['name' => 'manager']);
        $admin->givePermissionTo([
            'view dashboard',
            'manage tickets',
            'manage assignee',
            'access ticket'
        ]);

        $supervisor = Role::create(['name' => 'supervisor']);
        $supervisor->givePermissionTo([
            'view dashboard',
            'access ticket',
            'manage assignee'
        ]);

        $operator = Role::create(['name' => 'operator']);
        $operator->givePermissionTo([
            'view dashboard',
            'access ticket'
        ]);

        User::find(1)->assignRole('admin');
    }
}
