<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColoVisitor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function colo()
    {
        return $this->belongsTo(Colo::class);
    }
}
