<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ColoHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colo_histories';
    protected $fillable = [
        'colo_id',
        'role_to',
        'status',
        'aktif',
        'created_by',
        'note',
    ];

    public function coloId()
    {
        return $this->belongsTo(Colo::class, 'colo_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
