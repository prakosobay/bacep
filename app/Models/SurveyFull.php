<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFull extends Model
{
    use HasFactory;

    protected $table = 'survey_fulls';
    protected $primaryKey = 'id';
    protected $fillable = [
        'survey_id',
        'visit',
        'leave',
        'request',
        'link',
        'note',
        'status',
    ];
}
