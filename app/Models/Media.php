<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\MediaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $filename
 * @property string $slug
 * @property string $path
 * @property string $mime_type
 * @property int $size
 * @property string $disk
 * @property string|null $title
 * @property string|null $alt_text
 * @property string|null $caption
 * @property int $uploaded_by
 * @property int|null $media_directory_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read User $uploader
 * @property-read MediaDirectory|null $mediaDirectory
 */
class Media extends Model
{
    /** @use HasFactory<MediaFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'size' => 'integer',
        'uploaded_by' => 'integer',
        'media_directory_id' => 'integer',
    ];

    /**
     * Get the user that uploaded the media.
     *
     * @return BelongsTo<User, $this>
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the media directory that contains the media.
     *
     * @return BelongsTo<MediaDirectory, $this>
     */
    public function mediaDirectory(): BelongsTo
    {
        return $this->belongsTo(MediaDirectory::class, 'media_directory_id');
    }
}
