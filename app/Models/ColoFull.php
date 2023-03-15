<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ColoFull extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colo_fulls';
    protected $fillable = [
        'colo_id',
        'link',
        'status',
    ];

    public function coloId()
    {
        return $this->belongsTo(Colo::class, 'colo_id');
    }
}
