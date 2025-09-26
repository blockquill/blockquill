<?php

use App\Models\User;
use App\Policies\RolePolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->policy = new RolePolicy();
    $this->user = User::factory()->create();
    $this->role = Role::create(['name' => 'test-role']);
});

describe('RolePolicy', function () {
    test('viewAny', function () {
        // User without permission
        expect($this->policy->viewAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view_any:role']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->viewAny($this->user))->toBeTrue();
    });

    test('view', function () {
        // User without permission
        expect($this->policy->view($this->user, $this->role))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view:role']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->view($this->user, $this->role))->toBeTrue();
    });

    test('create', function () {
        // User without permission
        expect($this->policy->create($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'create:role']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->create($this->user))->toBeTrue();
    });

    test('update', function () {
        // User without permission
        expect($this->policy->update($this->user, $this->role))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'update:role']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->update($this->user, $this->role))->toBeTrue();
    });

    test('delete', function () {
        // User without permission
        expect($this->policy->delete($this->user, $this->role))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'delete:role']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->delete($this->user, $this->role))->toBeTrue();
    });

    test('restore', function () {
        // User without permission
        expect($this->policy->restore($this->user, $this->role))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore:role']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restore($this->user, $this->role))->toBeTrue();
    });

    test('forceDelete', function () {
        // User without permission
        expect($this->policy->forceDelete($this->user, $this->role))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete:role']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDelete($this->user, $this->role))->toBeTrue();
    });
});