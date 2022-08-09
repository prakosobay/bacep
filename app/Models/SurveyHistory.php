<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyHistory extends Model
{
<<<<<<< HEAD
    use HasFactory,SoftDeletes;
    protected $table = 'survey_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'survey_id', 'created_by', 'role_to', 'status', 'aktif', 'pdf',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
=======
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
>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098
}
