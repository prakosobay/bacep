<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalFull extends Model
{
    use HasFactory;

    protected $table = 'internal_fulls';
    protected $primaryKey = 'id';
    protected $fillable = [
        'internal_id', 'req_dept', 'work', 'visit', 'leave', 'request', 'status', 'link', 'note',
    ];

    public function internals()
    {
        return $this->belongsTo(Internal::class);
    }
}
