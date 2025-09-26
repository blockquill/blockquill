<?php

namespace App\Models;

use App\Enums\TaxonomyType;
use Carbon\Carbon;
use Database\Factories\TaxonomyFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property TaxonomyType $type
 * @property int|null $parent_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property-read Taxonomy|null $parent
 * @property-read Collection<int, Taxonomy> $children
 * @property-read Collection<int, Post> $posts
 */
class Taxonomy extends Model
{
    /** @use HasFactory<TaxonomyFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'parent_id',
    ];

    protected $casts = [
        'type' =>  TaxonomyType::class,
        'parent_id' => 'integer',
    ];

    /**
     * Get the parent taxonomy.
     * 
     * @return BelongsTo<Taxonomy, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Taxonomy::class, 'parent_id');
    }

    /**
     * Get the child taxonomies.
     * 
     * @return HasMany<Taxonomy, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Taxonomy::class, 'parent_id');
    }

    /**
     * The posts that belong to the taxonomy.
     *
     * @return BelongsToMany<Post, $this>
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_taxonomy', 'taxonomy_id', 'post_id');
    }
}
