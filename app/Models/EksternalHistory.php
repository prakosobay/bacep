<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EksternalHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'eksternal_histories';
    protected $fillable = [
        'eksternal_id',
        'created_by',
        'role_to',
        'status',
        'aktif',
        'pdf',
        'type',
    ];

    public function eksternalId()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
