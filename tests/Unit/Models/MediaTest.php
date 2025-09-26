<?php

use App\Models\Media;
use App\Models\MediaDirectory;
use App\Models\User;

beforeEach(function () {
    $this->media = Media::factory()->create([
        'filename' => 'test-image.jpg',
        'mime_type' => 'image/jpeg',
        'size' => 1024,
    ]);
});

test('fillable attributes', function () {
    expect($this->media->getFillable())->toBe([
        'filename',
        'slug',
        'path',
        'mime_type',
        'size',
        'disk',
        'title',
        'alt_text',
        'caption',
        'uploaded_by',
        'media_directory_id',
    ]);
});

test('casts', function () {
    expect($this->media->getCasts())
        ->toHaveKey('size')
        ->toHaveKey('uploaded_by')
        ->toHaveKey('media_directory_id');
});

test('relations', function () {
    expect($this->media->uploader)->toBeInstanceOf(User::class);

    $mediaWithDirectory = Media::factory()->create([
        'media_directory_id' => MediaDirectory::factory()->create()->id,
    ]);

    expect($mediaWithDirectory->mediaDirectory)->toBeInstanceOf(MediaDirectory::class);
});

test('soft deletes', function () {
    $this->media->delete();

    expect($this->media->fresh()->deleted_at)->not()->toBeNull()
        ->and(Media::count())->toBe(0)
        ->and(Media::withTrashed()->count())->toBe(1);
});

test('integer casting', function () {
    expect($this->media->size)->toBeInt();
});
