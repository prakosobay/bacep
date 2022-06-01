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

    public function created_by()
    {
        return $this->belongsTo(User::class);
    }

    public function other()
    {
        return $this->belongsTo(Other::class);
    }
}
