<?php

use App\Enums\PostStatus;
use App\Enums\PostType;
use App\Enums\TaxonomyType;
use App\Models\Media;
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\Taxonomy;
use App\Models\User;

beforeEach(function () {
    $this->post = Post::factory()->create([
        'title' => 'Test Post',
        'slug' => 'test-post',
        'status' => PostStatus::DRAFT,
        'type' => PostType::ARTICLE,
    ]);
});

test('fillable attributes', function () {
    expect($this->post->getFillable())->toBe([
        'title',
        'slug',
        'content',
        'excerpt',
        'status',
        'scheduled_at',
        'type',
        'featured_image_id',
        'author_id',
        'published_at',
    ]);
});

test('casts', function () {
    expect($this->post->getCasts())
        ->toHaveKey('scheduled_at')
        ->toHaveKey('published_at')
        ->toHaveKey('status')
        ->toHaveKey('type')
        ->toHaveKey('featured_image_id')
        ->toHaveKey('author_id');
});

test('relations', function () {
    expect($this->post->author)->toBeInstanceOf(User::class);

    $postWithMedia = Post::factory()->create([
        'featured_image_id' => Media::factory()->create()->id,
    ]);

    expect($postWithMedia->featuredImage)->toBeInstanceOf(Media::class);

    // Test metas relation by creating some metas
    PostMeta::factory()->count(2)->create(['post_id' => $this->post->id]);
    expect($this->post->metas)->each->toBeInstanceOf(PostMeta::class)
        ->and($this->post->metas)->toHaveCount(2);
});

test('taxonomy relations', function () {
    $category = Taxonomy::factory()->create(['type' => TaxonomyType::CATEGORY]);
    $tag = Taxonomy::factory()->create(['type' => TaxonomyType::TAG]);

    $this->post->taxonomies()->attach([$category->id, $tag->id]);

    expect($this->post->taxonomies)->toHaveCount(2)
        ->and($this->post->categories)->toHaveCount(1)
        ->and($this->post->tags)->toHaveCount(1)
        ->and($this->post->categories->first()->type)->toBe(TaxonomyType::CATEGORY)
        ->and($this->post->tags->first()->type)->toBe(TaxonomyType::TAG);
});

test('soft deletes', function () {
    $this->post->delete();

    expect($this->post->fresh()->deleted_at)->not()->toBeNull()
        ->and(Post::count())->toBe(0)
        ->and(Post::withTrashed()->count())->toBe(1);
});

test('enum casting', function () {
    expect($this->post->status)->toBeInstanceOf(PostStatus::class)
        ->and($this->post->type)->toBeInstanceOf(PostType::class);
});
