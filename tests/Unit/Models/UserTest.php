<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

test('fillable attributes', function () {
    expect($this->user->getFillable())->toBe([
        'name',
        'email',
        'password',
    ]);
});

test('hidden attributes', function () {
    expect($this->user->getHidden())->toBe([
        'password',
        'remember_token',
    ]);
});

test('casts', function () {
    expect($this->user->getCasts())
        ->toHaveKey('email_verified_at')
        ->toHaveKey('password');
});

test('soft deletes', function () {
    $this->user->delete();

    expect($this->user->fresh()->deleted_at)->not()->toBeNull()
        ->and(User::count())->toBe(0)
        ->and(User::withTrashed()->count())->toBe(1);
});

test('roles functionality', function () {
    $role = Role::create(['name' => 'admin']);
    $this->user->assignRole($role);

    expect($this->user->hasRole('admin'))->toBeTrue()
        ->and($this->user->roles)->toHaveCount(1);
});

test('filament panel access', function () {
    $panel = new class extends \Filament\Panel
    {
        public function __construct() {}
    };

    expect($this->user->canAccessPanel($panel))->toBeTrue();
});

test('password hashing', function () {
    $user = User::factory()->create(['password' => 'plain-password']);

    expect($user->password)->not()->toBe('plain-password')
        ->and(strlen($user->password))->toBeGreaterThan(50);
});
