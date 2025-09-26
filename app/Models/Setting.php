<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\SettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class Setting extends Model
{
    /** @use HasFactory<SettingFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'value',
    ];
}
