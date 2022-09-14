<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBm extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function personils()
    {
        return $this->hasMany(TroubleshootBmPersonil::class);
    }

    public function details()
    {
        return $this->hasMany(TroubleshootBmDetail::class);
    }

    public function histories()
    {
        return $this->hasMany(TroubleshootBmHistory::class);
    }

    public function risks()
    {
        return $this->hasMany(TroubleshootBmRisk::class);
    }

    public function full()
    {
        return $this->hasOne(TroubleshootBmFull::class);
    }

    public function entry()
    {
        return $this->hasOne(TroubleshootBmEntry::class);
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
