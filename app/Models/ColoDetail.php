<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColoDetail extends Model
{
    use HasFactory;

    protected $table = 'colo_details';
    protected $guarded = [];

    public function colo()
    {
        return $this->belongsTo(Colo::class);
    }
}
