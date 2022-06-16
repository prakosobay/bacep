<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'troubleshoot_bm_id';
    protected $primaryKey = 'id';
    protected $fillable = [
        'troubleshoot_bm_id', 'time_start', 'time_end', 'activity', 'service_impact', 'item', 'procedure'
    ];
}
