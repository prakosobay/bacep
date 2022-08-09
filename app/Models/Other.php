<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Other extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function other_personils()
    {
        return $this->hasMany(OtherPersonil::class);
    }

    public function other_histories()
    {
        return $this->hasMany(OtherHistory::class);
    }


}
