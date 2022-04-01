<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyVisitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'survey_visitors';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function survey()
    {
        return $this->belongsToMany(Survey::class);
    }
}
