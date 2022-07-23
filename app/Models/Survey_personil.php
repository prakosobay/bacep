<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey_personil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surveys_personils';
    protected $primaryKey = 'id';
    protected $fillable =
    [
       
    ];

}
