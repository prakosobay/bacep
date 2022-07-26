<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'internals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'req_dept',
        'req_name',
        'req_phone',
        'work',
        'visit',
        'leave',
        'background',
        'desc',
        'testing',
        'rollback',
        'rack',
        'card_number',
        'reject_note',
        'req_email',
    ];
}
