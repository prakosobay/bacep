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
        'troubleshoot_bm_id',
        'dc',
        'mmr1',
        'mmr2',
        'ups',
        'fss',
        'trafo',
        'panel',
        'baterai',
        'generator',
        'yard',
        'parking',
        'lain',
    ];

    public function troubleshoot_bm()
    {
        return $this->belongsTo(TroubleshootBm::class, 'troubleshoot_bm_id');
    }
}
