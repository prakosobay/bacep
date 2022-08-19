<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFull extends Model
{

    use HasFactory;

    protected $table = 'survey_fulls';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
