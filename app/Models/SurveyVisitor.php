<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyVisitor extends Model
{
    use HasFactory;

    protected $table = 'survey_visitors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'survey_id',
        'name',
        'company',
        'department',
        'phone',
        'numberId',
        'checkin',
        'photo_checkin',
        'checkout',
        'photo_checkout',
    ];
}
