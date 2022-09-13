<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Other extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function personils()
    {
        return $this->hasMany(OtherPersonil::class);
    }

    public function histories()
    {
        return $this->hasMany(OtherHistory::class);
    }

    public function full()
    {
        return $this->hasOne(OtherFull::class);
    }

    public function penomoranAR()
    {
        return $this->belongsTo(PenomoranAR::class, 'penomoranar_id');
    }

    public function penomoranCR()
    {
        return $this->belongsTo(PenomoranCR::class, 'penomorancr_id');
    }
}
