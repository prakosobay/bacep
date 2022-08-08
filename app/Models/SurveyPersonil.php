<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyPersonil extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'survey_personils';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'survey_id', 'name', 'company', 'department', 'phone', 'numberId', 'respon', 'checkin', 'photo_checkin', 'checkout', 'photo_checkout'
    ];
}
