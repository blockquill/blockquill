<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'super_admin' => [
                'view_any:role',
                'view:role',
                'create:role',
                'update:role',
                'delete:role',
                'restore:role',
                'force_delete:role',
                'delete_any:role',
                'restore_any:role',
                'force_delete_any:role',

                'view_any:media_directory',
                'view:media_directory',
                'create:media_directory',
                'update:media_directory',
                'delete:media_directory',
                'restore:media_directory',
                'force_delete:media_directory',
                'delete_any:media_directory',
                'restore_any:media_directory',
                'force_delete_any:media_directory',

                'view_any:media',
                'view:media',
                'create:media',
                'update:media',
                'delete:media',
                'restore:media',
                'force_delete:media',
                'delete_any:media',
                'restore_any:media',
                'force_delete_any:media',
            ],
        ];

        foreach ($permissions as $role => $perms) {
            $roleModel = Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);

            foreach ($perms as $perm) {
                $permissionModel = Permission::firstOrCreate(['name' => $perm]);
                if (! $roleModel->hasPermissionTo($permissionModel)) {
                    $roleModel->givePermissionTo($permissionModel);
                }
            }
        }
    }
}
