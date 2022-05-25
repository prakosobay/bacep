<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherPersonil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'other_personils';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
