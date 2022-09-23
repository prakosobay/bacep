<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenomoranCleaning extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penomoran_cleanings';
    protected $guarded = [];

    public function cleaning()
    {
        return $this->belongsTo(Clenaning::class, 'cleaning_id');
    }

    public function troubleshoot()
    {
        return $this->belongsTo(TroubleshootBm::class, 'troubleshoot_bm_id');
    }

    public function maintenance()
    {
        return $this->belongsTo(Other::class, 'other_id');
    }
}
