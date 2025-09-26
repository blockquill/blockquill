<?php

use App\Models\Taxonomy;
use App\Models\Post;
use App\Enums\TaxonomyType;

beforeEach(function () {
    $this->taxonomy = Taxonomy::factory()->create([
        'name' => 'Technology',
        'slug' => 'technology',
        'type' => TaxonomyType::CATEGORY,
    ]);
});

test('fillable attributes', function () {
    expect($this->taxonomy->getFillable())->toBe([
        'name',
        'slug',
        'type',
        'parent_id',
    ]);
});

test('casts', function () {
    expect($this->taxonomy->getCasts())
        ->toHaveKey('type')
        ->toHaveKey('parent_id');
});

test('relations', function () {
    $child = Taxonomy::factory()->create(['parent_id' => $this->taxonomy->id]);
    $post = Post::factory()->create();
    $this->taxonomy->posts()->attach($post->id);

    expect($this->taxonomy->children)->toHaveCount(1)
        ->and($this->taxonomy->posts)->toHaveCount(1)
        ->and($this->taxonomy->posts->first())->toBeInstanceOf(Post::class);
});

test('hierarchical structure', function () {
    $child = Taxonomy::factory()->create(['parent_id' => $this->taxonomy->id]);
    
    expect($child->parent->id)->toBe($this->taxonomy->id)
        ->and($this->taxonomy->children->first()->id)->toBe($child->id);
});

test('soft deletes', function () {
    $this->taxonomy->delete();
    
    expect($this->taxonomy->fresh()->deleted_at)->not()->toBeNull()
        ->and(Taxonomy::count())->toBe(0)
        ->and(Taxonomy::withTrashed()->count())->toBe(1);
});

test('enum casting', function () {
    expect($this->taxonomy->type)->toBeInstanceOf(TaxonomyType::class)
        ->and($this->taxonomy->type)->toBe(TaxonomyType::CATEGORY);
});