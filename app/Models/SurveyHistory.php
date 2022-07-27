<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyHistory extends Model
{
    use HasFactory;

    protected $table = 'survey_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'survey_id',
        'created_by',
        'role_to',
        'status',
        'aktif',
        'pdf',
    ];
}
