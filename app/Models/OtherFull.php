<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherFull extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'other_fulls';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function other()
    {
        return $this->belongsTo(OtherFull::class, 'other_id');
    }
}
