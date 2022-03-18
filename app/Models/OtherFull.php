<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class OtherFull extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'other_fulls';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
