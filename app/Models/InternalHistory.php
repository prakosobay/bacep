<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function internal()
    {
        return $this->belongsTo(Internal::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
