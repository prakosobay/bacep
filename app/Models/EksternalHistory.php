<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EksternalHistory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'eksternal_histories';

    public function eksternal()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}