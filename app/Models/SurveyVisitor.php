<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyVisitor extends Model
{
    use HasFactory;

    protected $table = 'survey_visitors';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
