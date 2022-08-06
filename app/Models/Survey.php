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
    protected $fillable = [
    'visit', 'leave', 'name_req', 'dept_req', 'phone_req',
    ];
    public function survey_personils()
    {
        return $this->hasMany(SurveyPersonil::class);
    }
}
