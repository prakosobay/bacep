<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChangeRequestInternal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'change_request_internals';
    protected $guarded = [];

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }
}
