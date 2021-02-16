<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'survey';
    protected $primaryKey = 'survey_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'months',
        'year',
        'purpose_work',
        'visitor_name',
        'visitor_company',
        'visitor_id',
        'visitor_department',
        'visitor_phone',
        'validity',
        'time_in',
        'time_out',
        'lokasi',
        'akses',
    ];
}
