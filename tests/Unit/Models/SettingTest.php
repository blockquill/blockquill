<?php

use App\Models\Setting;

beforeEach(function () {
    $this->setting = Setting::factory()->create([
        'key' => 'site_name',
        'value' => 'My Blog',
    ]);
});

test('fillable attributes', function () {
    expect($this->setting->getFillable())->toBe([
        'key',
        'value',
    ]);
});

test('soft deletes', function () {
    $this->setting->delete();

    expect($this->setting->fresh()->deleted_at)->not()->toBeNull()
        ->and(Setting::count())->toBe(0)
        ->and(Setting::withTrashed()->count())->toBe(1);
});

test('value storage', function () {
    $jsonSetting = Setting::factory()->create([
        'key' => 'config',
        'value' => '{"theme": "dark", "lang": "en"}',
    ]);

    expect($this->setting->value)->toBe('My Blog')
        ->and($jsonSetting->value)->toBe('{"theme": "dark", "lang": "en"}')
        ->and(json_decode($jsonSetting->value, true))->toBe(['theme' => 'dark', 'lang' => 'en']);
});
