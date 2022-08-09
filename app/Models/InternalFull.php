<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalFull extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_id',
        'req_dept',
        'work',
        'visit',
        'leave',
        'request',
        'status',
        'link',
        'note',
    ];

    public function internal()
    {
        return $this->belongsTo(Internal::class);
    }
}
