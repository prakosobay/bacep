<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'troubleshoot_bm_histories';
    protected $primaryKey = 'id';
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
        return $this->belongsTo(User::class, 'created_by');
    }

    public function troubleshoot()
    {
        return $this->belongsTo(TroubleshootBm::class, 'troubleshoot_bm_id');
    }
}
