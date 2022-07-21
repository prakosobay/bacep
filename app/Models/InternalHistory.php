<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalHistory extends Model
{
    use HasFactory;

    protected $table = 'internal_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'internal_id', 'req_dept', 'created_by', 'status', 'role_to', 'aktif', 'pdf',
    ];
}
