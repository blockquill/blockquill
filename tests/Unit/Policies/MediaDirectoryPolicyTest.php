<?php

use App\Models\MediaDirectory;
use App\Models\User;
use App\Policies\MediaDirectoryPolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->policy = new MediaDirectoryPolicy();
    $this->user = User::factory()->create();
    $this->mediaDirectory = MediaDirectory::factory()->create();
});

describe('MediaDirectoryPolicy', function () {
    test('viewAny', function () {
        // User without permission
        expect($this->policy->viewAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view_any:media_directory']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->viewAny($this->user))->toBeTrue();
    });

    test('view', function () {
        // User without permission
        expect($this->policy->view($this->user, $this->mediaDirectory))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view:media_directory']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->view($this->user, $this->mediaDirectory))->toBeTrue();
    });

    test('create', function () {
        // User without permission
        expect($this->policy->create($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'create:media_directory']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->create($this->user))->toBeTrue();
    });

    test('update', function () {
        // User without permission
        expect($this->policy->update($this->user, $this->mediaDirectory))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'update:media_directory']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->update($this->user, $this->mediaDirectory))->toBeTrue();
    });

    test('delete', function () {
        // User without permission
        expect($this->policy->delete($this->user, $this->mediaDirectory))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'delete:media_directory']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->delete($this->user, $this->mediaDirectory))->toBeTrue();
    });

    test('restore', function () {
        // User without permission
        expect($this->policy->restore($this->user, $this->mediaDirectory))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore:media_directory']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restore($this->user, $this->mediaDirectory))->toBeTrue();
    });

    test('forceDelete', function () {
        // User without permission
        expect($this->policy->forceDelete($this->user, $this->mediaDirectory))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete:media_directory']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDelete($this->user, $this->mediaDirectory))->toBeTrue();
    });
});