<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_id',
        'req_dept',
        'created_by',
        'status',
        'role_to',
        'aktif',
        'pdf',
    ];

    public function internal()
    {
        return $this->belongsTo(Internal::class);
    }
}
