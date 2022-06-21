<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'troubleshoot_bm_entries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'server', 'mmr1', 'mmr2', 'ups', 'fss', 'cctv', 'trafo', 'baterai', 'panel', 'generator', 'yard', 'parking', 'lain', 'troubleshoot_bm_id'
    ];

    public function troubleshoot_bm()
    {
        return $this->belongsTo(TroubleshootBm::class);
    }
}
