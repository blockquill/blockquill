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
                'replicate:role',
                'reorder:role',

                'view_any:user',
                'view:user',
                'create:user',
                'update:user',
                'delete:user',
                'restore:user',
                'force_delete:user',
                'delete_any:user',
                'restore_any:user',
                'force_delete_any:user',
                'replicate:user',
                'reorder:user',

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
                'replicate:media_directory',
                'reorder:media_directory',

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
                'replicate:media',
                'reorder:media',

                'view_any:post',
                'view:post',
                'create:post',
                'update:post',
                'delete:post',
                'restore:post',
                'force_delete:post',
                'delete_any:post',
                'restore_any:post',
                'force_delete_any:post',
                'replicate:post',
                'reorder:post',

                'view_any:post_meta',
                'view:post_meta',
                'create:post_meta',
                'update:post_meta',
                'delete:post_meta',
                'restore:post_meta',
                'force_delete:post_meta',
                'delete_any:post_meta',
                'restore_any:post_meta',
                'force_delete_any:post_meta',
                'replicate:post_meta',
                'reorder:post_meta',

                'view_any:setting',
                'view:setting',
                'create:setting',
                'update:setting',
                'delete:setting',
                'restore:setting',
                'force_delete:setting',
                'delete_any:setting',
                'restore_any:setting',
                'force_delete_any:setting',
                'replicate:setting',
                'reorder:setting',

                'view_any:taxonomy',
                'view:taxonomy',
                'create:taxonomy',
                'update:taxonomy',
                'delete:taxonomy',
                'restore:taxonomy',
                'force_delete:taxonomy',
                'delete_any:taxonomy',
                'restore_any:taxonomy',
                'force_delete_any:taxonomy',
                'replicate:taxonomy',
                'reorder:taxonomy',
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
