<?php

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Spatie\Permission\Models\Permission;

beforeEach(function () {
    $this->policy = new PostPolicy;
    $this->user = User::factory()->create();
    $this->post = Post::factory()->create();
});

describe('PostPolicy', function () {
    test('viewAny', function () {
        // User without permission
        expect($this->policy->viewAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view_any:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->viewAny($this->user))->toBeTrue();
    });

    test('view', function () {
        // User without permission
        expect($this->policy->view($this->user, $this->post))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->view($this->user, $this->post))->toBeTrue();
    });

    test('create', function () {
        // User without permission
        expect($this->policy->create($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'create:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->create($this->user))->toBeTrue();
    });

    test('update', function () {
        // User without permission
        expect($this->policy->update($this->user, $this->post))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'update:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->update($this->user, $this->post))->toBeTrue();
    });

    test('delete', function () {
        // User without permission
        expect($this->policy->delete($this->user, $this->post))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'delete:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->delete($this->user, $this->post))->toBeTrue();
    });

    test('restore', function () {
        // User without permission
        expect($this->policy->restore($this->user, $this->post))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restore($this->user, $this->post))->toBeTrue();
    });

    test('forceDelete', function () {
        // User without permission
        expect($this->policy->forceDelete($this->user, $this->post))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDelete($this->user, $this->post))->toBeTrue();
    });

    test('forceDeleteAny', function () {
        // User without permission
        expect($this->policy->forceDeleteAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete_any:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDeleteAny($this->user))->toBeTrue();
    });

    test('restoreAny', function () {
        // User without permission
        expect($this->policy->restoreAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore_any:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restoreAny($this->user))->toBeTrue();
    });

    test('replicate', function () {
        // User without permission
        expect($this->policy->replicate($this->user, $this->post))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'replicate:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->replicate($this->user, $this->post))->toBeTrue();
    });

    test('reorder', function () {
        // User without permission
        expect($this->policy->reorder($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'reorder:post']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->reorder($this->user))->toBeTrue();
    });
});
