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
