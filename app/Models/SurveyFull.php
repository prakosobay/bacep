<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFull extends Model
{
<<<<<<< HEAD
    
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
=======
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
>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098
}
