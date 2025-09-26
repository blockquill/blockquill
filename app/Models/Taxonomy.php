<?php

namespace App\Models;

use App\Enums\TaxonomyType;
use Carbon\Carbon;
use Database\Factories\TaxonomyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
