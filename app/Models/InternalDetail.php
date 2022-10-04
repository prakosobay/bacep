<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'internal_details';

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }
}
