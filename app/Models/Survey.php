<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    
    use HasFactory,SoftDeletes;

    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $fillable = [
<<<<<<< HEAD
    'visit', 'leave', 'name_req', 'dept_req', 'phone_req',
    ];
    public function survey_personils()
    {
        return $this->hasMany(SurveyPersonil::class);
    }
=======
        'visit',
        'leave',
        'req_name',
        'req_dept',
        'req_phone',
        'req_email',
        'reject_note',
    ];
>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098
}
