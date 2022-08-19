<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{

    use HasFactory,SoftDeletes;

    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function survey_visitors()
    {
        return $this->hasMany(SurveyVisitor::class);
    }

    public function survey_histories()
    {
        return $this->hasMany(SurveyHistory::class);
    }

    public function survey_fulls()
    {
        return $this->hasMany(SurveyFull::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
