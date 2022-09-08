<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherHistory extends Model
{
    use HasFactory;

    protected $table = 'other_histories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function other()
    {
        return $this->belongsTo(Other::class, 'other_id');
    }
}
