<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Survey;

class SurveyHistory extends Model
{
    use HasFactory;

    protected $table = 'survey_histories';
    protected $primaryKey = 'survey_history_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'survey_id',
        'created_by',
        'role_to',
        'status',
        'aktif'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
