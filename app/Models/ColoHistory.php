<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColoHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function colo()
    {
        return $this->belongsTo(Colo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
