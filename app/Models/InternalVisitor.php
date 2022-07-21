<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalVisitor extends Model
{
    use HasFactory;

    protected $table = 'internal_visitors';
    protected $primaryKey = 'id';
    protected $fillabel = [
        'internal_id', 'req_dept', 'name', 'company', 'department', 'respon', 'numberId', 'phone',
    ];
}
