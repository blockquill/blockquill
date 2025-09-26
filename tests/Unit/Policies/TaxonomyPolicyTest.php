<?php

use App\Models\Taxonomy;
use App\Models\User;
use App\Policies\TaxonomyPolicy;
use Spatie\Permission\Models\Permission;

beforeEach(function () {
    $this->policy = new TaxonomyPolicy;
    $this->user = User::factory()->create();
    $this->taxonomy = Taxonomy::factory()->create();
});

describe('TaxonomyPolicy', function () {
    test('viewAny', function () {
        // User without permission
        expect($this->policy->viewAny($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view_any:taxonomy']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->viewAny($this->user))->toBeTrue();
    });

    test('view', function () {
        // User without permission
        expect($this->policy->view($this->user, $this->taxonomy))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'view:taxonomy']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->view($this->user, $this->taxonomy))->toBeTrue();
    });

    test('create', function () {
        // User without permission
        expect($this->policy->create($this->user))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'create:taxonomy']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->create($this->user))->toBeTrue();
    });

    test('update', function () {
        // User without permission
        expect($this->policy->update($this->user, $this->taxonomy))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'update:taxonomy']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->update($this->user, $this->taxonomy))->toBeTrue();
    });

    test('delete', function () {
        // User without permission
        expect($this->policy->delete($this->user, $this->taxonomy))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'delete:taxonomy']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->delete($this->user, $this->taxonomy))->toBeTrue();
    });

    test('restore', function () {
        // User without permission
        expect($this->policy->restore($this->user, $this->taxonomy))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'restore:taxonomy']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->restore($this->user, $this->taxonomy))->toBeTrue();
    });

    test('forceDelete', function () {
        // User without permission
        expect($this->policy->forceDelete($this->user, $this->taxonomy))->toBeFalse();

        // User with permission
        $permission = Permission::create(['name' => 'force_delete:taxonomy']);
        $this->user->givePermissionTo($permission);
        expect($this->policy->forceDelete($this->user, $this->taxonomy))->toBeTrue();
    });
});
