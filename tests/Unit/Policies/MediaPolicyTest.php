<?php

use App\Models\Media;
use App\Models\User;
use App\Policies\MediaPolicy;
use Spatie\Permission\Models\Permission;

beforeEach(function () {
    $this->policy = new MediaPolicy;
    $this->user = User::factory()->create();
    $this->media = Media::factory()->create();
});

describe('MediaPolicy', function () {
    test('viewAny', function () {
        // User without permission
        expect($this->policy->viewAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view_any:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->viewAny($this->user))->toBeTrue();
    });

    test('view', function () {
        // User without permission
        expect($this->policy->view($this->user, $this->media))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->view($this->user, $this->media))->toBeTrue();
    });

    test('create', function () {
        // User without permission
        expect($this->policy->create($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'create:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->create($this->user))->toBeTrue();
    });

    test('update', function () {
        // User without permission
        expect($this->policy->update($this->user, $this->media))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'update:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->update($this->user, $this->media))->toBeTrue();
    });

    test('delete', function () {
        // User without permission
        expect($this->policy->delete($this->user, $this->media))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'delete:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->delete($this->user, $this->media))->toBeTrue();
    });

    test('restore', function () {
        // User without permission
        expect($this->policy->restore($this->user, $this->media))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restore($this->user, $this->media))->toBeTrue();
    });

    test('forceDelete', function () {
        // User without permission
        expect($this->policy->forceDelete($this->user, $this->media))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDelete($this->user, $this->media))->toBeTrue();
    });

    test('forceDeleteAny', function () {
        // User without permission
        expect($this->policy->forceDeleteAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete_any:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDeleteAny($this->user))->toBeTrue();
    });

    test('restoreAny', function () {
        // User without permission
        expect($this->policy->restoreAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore_any:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restoreAny($this->user))->toBeTrue();
    });

    test('replicate', function () {
        // User without permission
        expect($this->policy->replicate($this->user, $this->media))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'replicate:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->replicate($this->user, $this->media))->toBeTrue();
    });

    test('reorder', function () {
        // User without permission
        expect($this->policy->reorder($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'reorder:media']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->reorder($this->user))->toBeTrue();
    });
});
