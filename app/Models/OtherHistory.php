<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class OtherHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'other_histories';
    protected $guarded = [];
}
