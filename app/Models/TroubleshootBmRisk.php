<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmRisk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'troubleshoot_bm_risks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'troubleshoot_bm_id', 'risk', 'poss', 'impact', 'mitigation'
    ];

    public function troubleshoot_bm()
    {
        return $this->belongsTo(TroubleshootBm::class);
    }
}
