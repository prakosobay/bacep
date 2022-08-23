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

    public function visitors()
    {
        return $this->hasMany(SurveyVisitor::class);
    }

    public function histories()
    {
        return $this->hasMany(SurveyHistory::class);
    }

    public function full()
    {
        return $this->hasOne(SurveyFull::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
