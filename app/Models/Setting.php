<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\SettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class Setting extends BaseModel
{
    /** @use HasFactory<SettingFactory> */
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];
}
