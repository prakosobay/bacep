<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColoRisk extends Model
{
    use HasFactory;

    protected $table = 'colo_risks';
    protected $guarded = [];

    public function colo()
    {
        return $this->belongsTo(Colo::class);
    }
}
