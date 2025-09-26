<?php

use App\Models\Setting;
use App\Models\User;
use App\Policies\SettingPolicy;
use Spatie\Permission\Models\Permission;

beforeEach(function () {
    $this->policy = new SettingPolicy;
    $this->user = User::factory()->create();
    $this->setting = Setting::factory()->create();
});

describe('SettingPolicy', function () {
    test('viewAny', function () {
        // User without permission
        expect($this->policy->viewAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view_any:setting']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->viewAny($this->user))->toBeTrue();
    });

    test('view', function () {
        // User without permission
        expect($this->policy->view($this->user, $this->setting))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view:setting']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->view($this->user, $this->setting))->toBeTrue();
    });

    test('create', function () {
        // User without permission
        expect($this->policy->create($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'create:setting']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->create($this->user))->toBeTrue();
    });

    test('update', function () {
        // User without permission
        expect($this->policy->update($this->user, $this->setting))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'update:setting']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->update($this->user, $this->setting))->toBeTrue();
    });

    test('delete', function () {
        // User without permission
        expect($this->policy->delete($this->user, $this->setting))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'delete:setting']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->delete($this->user, $this->setting))->toBeTrue();
    });

    test('restore', function () {
        // User without permission
        expect($this->policy->restore($this->user, $this->setting))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore:setting']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restore($this->user, $this->setting))->toBeTrue();
    });

    test('forceDelete', function () {
        // User without permission
        expect($this->policy->forceDelete($this->user, $this->setting))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete:setting']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDelete($this->user, $this->setting))->toBeTrue();
    });
});
