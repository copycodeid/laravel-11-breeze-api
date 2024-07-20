<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $roles = collect(['superadmin', 'admin', 'operator', 'registrant']);

        $roles->each(fn ($role) => Role::create(['name' => $role]));
        // Roles

        // Permission
        $permissions = collect([
            'update full account',
            'update half account',

            'management role permission',

            'store role',
            'update role',
            'delete role',

            'store permission',
            'update permission',
            'delete permission',

            'assign user role',
            'assign role permission',

            'management registration',
            'reset registration',

            'management schedule',

            'management users',

            'view admin',
            'store admin',
            'update admin',
            'update password admin',
            'delete admin',

            'view operator',
            'store operator',
            'update operator',
            'update password operator',
            'delete operator',

            'view registrant',
            'store registrant',
            'update registrant',
            'update password registrant',
            'delete registrant',

            'update biodata',
        ]);

        $permissions->each(fn ($permission) => Permission::create(['name' => $permission]));
        // Permission

        // Role -> Permission
        Role::findByName(name: 'admin')->givePermissionTo([
            'update full account',

            'management registration',

            'management users',

            'view registrant',
            'store registrant',
            'update registrant',
            'update password registrant',
            'delete registrant',

            'view operator',
            'store operator',
            'update operator',
            'update password operator',
            'delete operator',
        ]);

        Role::findByName(name: 'operator')->givePermissionTo([
            'update full account',
            'management users',
            'view registrant',
            'store registrant',
            'update registrant',
        ]);

        Role::findByName(name: 'registrant')->givePermissionTo([
            'update half account',
            'update biodata',
        ]);
        // Role -> Permission

        // User -> Role
        User::find(1)->assignRole('superadmin');
        User::find(2)->assignRole('admin');
        User::find(3)->assignRole('operator');
        // User -> Role
    }
}
