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
        'work', 'request', 'leave', 'visit', 'link', 'note', 'status', 'troubleshoot_bm_id'
    ];

    public function troubleshoot_bms()
    {
        return $this->belongsTo(TroubleshootBm::class);
    }
}
