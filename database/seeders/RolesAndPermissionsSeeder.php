<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Example create permissions
        /* Permission::create(['name' => 'module-create-content']);
        Permission::create(['name' => 'module-edit-content']);
        Permission::create(['name' => 'module-delete-content']);
        Permission::create(['name' => 'module-read-content']);

        $role = Role::create(['name' => 'module-editor'])
            ->givePermissionTo([
                'module-create-content',
                'module-edit-content',
                'module-read-content',
            ]);

        $role = Role::create(['name' => 'module-super-editor'])
            ->givePermissionTo([
                'module-create-content',
                'module-edit-content',
                'module-delete-content',
                'module-read-content',
            ]);

        $role = Role::create(['name' => 'module-supervisor'])
            ->givePermissionTo([
                'module-read-content',
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all()); */
    }
}
