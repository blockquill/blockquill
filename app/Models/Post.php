<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Enums\PostType;
use App\Enums\TaxonomyType;
use Carbon\Carbon;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $excerpt
 * @property PostStatus $status
 * @property Carbon|null $scheduled_at
 * @property PostType $type
 * @property int|null $featured_image_id
 * @property int|null $author_id
 * @property Carbon|null $published_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read User|null $author
 * @property-read Media|null $featuredImage
 * @property-read Collection<int, Taxonomy> $taxonomies
 * @property-read Collection<int, Taxonomy> $categories
 * @property-read Collection<int, Taxonomy> $tags
 */
class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'published_at' => 'datetime',
        'status' => PostStatus::class,
        'type' => PostType::class,
        'featured_image_id' => 'integer',
        'author_id' => 'integer',
    ];

    /**
     * Get the author that wrote the post.
     *
     * @return BelongsTo<User, $this>
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the featured image associated with the post.
     *
     * @return BelongsTo<Media, $this>
     */
    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }

    /**
     * The taxonomies that belong to the post.
     *
     * @return BelongsToMany<Taxonomy, $this>
     */
    public function taxonomies(): BelongsToMany
    {
        return $this->belongsToMany(Taxonomy::class, 'post_taxonomy', 'post_id', 'taxonomy_id');
    }

    /**
     * The categories that belong to the post.
     *
     * @return BelongsToMany<Taxonomy, $this>
     */
    public function categories(): BelongsToMany
    {
        return $this->taxonomies()->where('type', TaxonomyType::CATEGORY);
    }

    /**
     * The tags that belong to the post.
     *
     * @return BelongsToMany<Taxonomy, $this>
     */
    public function tags(): BelongsToMany
    {
        return $this->taxonomies()->where('type', TaxonomyType::TAG);
    }
}
