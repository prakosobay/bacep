<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'troubleshoot_bm_id',
        'created_by',
        'role_to',
        'status',
        'aktif',
        'pdf',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function troubleshoot_bm()
    {
        return $this->belongsTo(TroubleshootBm::class);
    }
}
