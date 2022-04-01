<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyHistory extends Model
{
    use HasFactory, SoftDeletes;

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
