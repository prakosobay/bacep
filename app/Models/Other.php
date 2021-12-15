<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Other extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'other';
    protected $primaryKey = 'other_id';
    protected $guarded = [];
}
