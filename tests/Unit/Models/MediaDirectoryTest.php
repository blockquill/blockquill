<?php

use App\Models\Media;
use App\Models\MediaDirectory;

beforeEach(function () {
    $this->mediaDirectory = MediaDirectory::factory()->create([
        'name' => 'Images',
    ]);
});

test('fillable attributes', function () {
    expect($this->mediaDirectory->getFillable())->toBe([
        'name',
        'parent_id',
    ]);
});

test('casts', function () {
    expect($this->mediaDirectory->getCasts())
        ->toHaveKey('parent_id');
});

test('relations', function () {
    $child = MediaDirectory::factory()->create(['parent_id' => $this->mediaDirectory->id]);
    $media = Media::factory()->create(['media_directory_id' => $this->mediaDirectory->id]);

    expect($this->mediaDirectory->children)->toHaveCount(1)
        ->and($this->mediaDirectory->media)->toHaveCount(1)
        ->and($child->parent->id)->toBe($this->mediaDirectory->id);
});

test('soft deletes', function () {
    $this->mediaDirectory->delete();

    expect($this->mediaDirectory->fresh()->deleted_at)->not()->toBeNull()
        ->and(MediaDirectory::count())->toBe(0)
        ->and(MediaDirectory::withTrashed()->count())->toBe(1);
});

test('hierarchical structure', function () {
    $parent = MediaDirectory::factory()->create(['name' => 'Parent']);
    $child = MediaDirectory::factory()->create([
        'name' => 'Child',
        'parent_id' => $parent->id,
    ]);

    expect($child->parent->name)->toBe('Parent')
        ->and($parent->children->first()->name)->toBe('Child');
});
