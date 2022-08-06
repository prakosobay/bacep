<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyFull extends Model
{
    
    use HasFactory,SoftDeletes;
    
    protected $table = 'survey_fulls';
    protected $primaryKey = 'id';
    protected $fillable = [
        'survey_id','work', 'visit', 'leave', 'request', 'link', 'note', 'status',
    ];

    public function surveys()
    {
        return $this->belongsTo(Survey::class);
    }
}
