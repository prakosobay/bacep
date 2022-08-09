<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBm extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function troubleshoot_bm_personil()
    {
        return $this->hasMany(TroubleshootBmPersonil::class);
    }

    public function troubleshoot_bm_detail()
    {
        return $this->hasMany(TroubleshootBmDetails::class);
    }

    public function troubleshoot_bm_history()
    {
        return $this->hasMany(TroubleshootBmHistory::class);
    }

    public function troubleshoot_bm_risk()
    {
        return $this->hasMany(TroubleshootBmRisk::class);
    }

    public function troubleshoot_bm_fulls()
    {
        return $this->hasOne(TroubleshootBmFull::class);
    }

    public function troubleshoot_bm_entries()
    {
        return $this->hasOne(TroubleshootBmEntry::class);
    }
}
