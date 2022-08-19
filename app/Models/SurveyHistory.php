<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyHistory extends Model
{
    use HasFactory;

    protected $table = 'survey_histories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
