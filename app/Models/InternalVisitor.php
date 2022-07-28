<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalVisitor extends Model
{
    use HasFactory;

    protected $fillabel = [
        'internal_id',
        'req_dept',
        'name',
        'company',
        'department',
        'respon',
        'numberId',
        'phone',
    ];

    public function internal()
    {
        return $this->belongsTo(Internal::class);
    }
}
