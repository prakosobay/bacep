<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmFull extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'troubleshoot_bm_fulls';
    protected $primaryKey = 'id';
    protected $fillable = [
        'troubleshoot_bm_id',
        'work',
        'request',
        'visit',
        'leave',
        'link',
        'note',
        'status',
    ];

    public function troubleshoot()
    {
        return $this->belongsTo(TroubleshootBm::class, 'troubleshoot_bm_id');
    }
}
