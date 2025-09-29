<?php

namespace App\Models;

use App\Traits\PreventRelatedRecordDeletionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use PreventRelatedRecordDeletionTrait, SoftDeletes;
}
