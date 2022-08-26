<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function internal()
    {
        return $this->belongsTo(Internal::class);
    }
}
