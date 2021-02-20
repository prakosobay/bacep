<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFull extends Model
{
    use HasFactory;

    protected $table = 'survey_fulls';
    protected $primaryKey = 'survey_full_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'survey_full_id',
        'survey_id',
        'visitor_name',
        'visitor_company',
        'purpose_work',
        'lokasi_file',
        'nama_file',
    ];
}
