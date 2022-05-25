<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Other extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'others';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function other_form()
    {
        return $this->belongsTo(OtherEntry::class);
    }

    public function personil()
    {
        return $this->hasMany(OtherPersonil::class);
    }
}
