<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalDetail extends Model
{
    use HasFactory;

    protected $fillabel = [
        'internal_id',
        'req_dept',
        'time_start',
        'time_end',
        'activity',
        'item',
        'service_impact',
    ];

    public function internal()
    {
        return $this->belongsTo(Internal::class);
    }
}
