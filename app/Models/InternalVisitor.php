<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalVisitor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }
}