<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\MediaDirectoryFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read MediaDirectory|null $parent
 * @property-read Collection<int, MediaDirectory> $children
 */
class MediaDirectory extends Model
{
    /** @use HasFactory<MediaDirectoryFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'parent_id' => 'integer',
    ];

    /**
     * Get the parent directory.
     *
     * @return BelongsTo<MediaDirectory, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(MediaDirectory::class, 'parent_id');
    }

    /**
     * Get the child directories.
     *
     * @return HasMany<MediaDirectory, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(MediaDirectory::class, 'parent_id');
    }

    /**
     * Get the media items in this directory.
     *
     * @return HasMany<Media, $this>
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class, 'media_directory_id');
    }
}
