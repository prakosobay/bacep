<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmFull extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'work',
        'request',
        'leave',
        'visit',
        'link',
        'note',
        'status',
        'troubleshoot_bm_id'
    ];

    public function troubleshoot_bm()
    {
        return $this->belongsTo(TroubleshootBm::class);
    }
}
