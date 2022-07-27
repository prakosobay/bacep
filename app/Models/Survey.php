<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $fillable = [
        'visit',
        'leave',
        'req_name',
        'req_dept',
        'req_phone',
        'req_email',
        'reject_note',
    ];
}
