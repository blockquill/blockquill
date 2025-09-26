<?php

use App\Models\Post;
use App\Models\PostMeta;

beforeEach(function () {
    $this->post = Post::factory()->create();
    $this->postMeta = PostMeta::factory()->create([
        'post_id' => $this->post->id,
        'key' => 'custom_field',
        'value' => 'custom_value',
    ]);
});

test('fillable attributes', function () {
    expect($this->postMeta->getFillable())->toBe([
        'post_id',
        'key',
        'value',
    ]);
});

test('casts', function () {
    expect($this->postMeta->getCasts())
        ->toHaveKey('post_id');
});

test('relations', function () {
    expect($this->postMeta->post)->toBeInstanceOf(Post::class)
        ->and($this->postMeta->post->id)->toBe($this->post->id);
});

test('soft deletes', function () {
    $this->postMeta->delete();

    expect($this->postMeta->fresh()->deleted_at)->not()->toBeNull()
        ->and(PostMeta::count())->toBe(0)
        ->and(PostMeta::withTrashed()->count())->toBe(1);
});

test('value handling', function () {
    expect($this->postMeta->key)->toBe('custom_field')
        ->and($this->postMeta->value)->toBe('custom_value');

    $nullMeta = PostMeta::factory()->create([
        'post_id' => $this->post->id,
        'key' => 'nullable_field',
        'value' => null,
    ]);

    expect($nullMeta->value)->toBeNull();
});
