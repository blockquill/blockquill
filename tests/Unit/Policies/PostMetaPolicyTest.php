<?php

use App\Models\PostMeta;
use App\Models\User;
use App\Policies\PostMetaPolicy;
use Spatie\Permission\Models\Permission;

beforeEach(function () {
    $this->policy = new PostMetaPolicy;
    $this->user = User::factory()->create();
    $this->postMeta = PostMeta::factory()->create();
});

describe('PostMetaPolicy', function () {
    test('viewAny', function () {
        // User without permission
        expect($this->policy->viewAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view_any:post_meta']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->viewAny($this->user))->toBeTrue();
    });

    test('view', function () {
        // User without permission
        expect($this->policy->view($this->user, $this->postMeta))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view:post_meta']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->view($this->user, $this->postMeta))->toBeTrue();
    });

    test('create', function () {
        // User without permission
        expect($this->policy->create($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'create:post_meta']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->create($this->user))->toBeTrue();
    });

    test('update', function () {
        // User without permission
        expect($this->policy->update($this->user, $this->postMeta))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'update:post_meta']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->update($this->user, $this->postMeta))->toBeTrue();
    });

    test('delete', function () {
        // User without permission
        expect($this->policy->delete($this->user, $this->postMeta))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'delete:post_meta']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->delete($this->user, $this->postMeta))->toBeTrue();
    });

    test('restore', function () {
        // User without permission
        expect($this->policy->restore($this->user, $this->postMeta))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore:post_meta']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restore($this->user, $this->postMeta))->toBeTrue();
    });

    test('forceDelete', function () {
        // User without permission
        expect($this->policy->forceDelete($this->user, $this->postMeta))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete:post_meta']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDelete($this->user, $this->postMeta))->toBeTrue();
    });
});
