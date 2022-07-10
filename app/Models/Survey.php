<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function survey()
    {
        return $this->hasMany(survey_personil::class);
    }
}