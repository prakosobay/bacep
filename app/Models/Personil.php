<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'personil';
    protected $guarded = [];
    protected $primaryKey = 'id';
}
