<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBmPersonil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'troubleshoot_bm_personils';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        'troubleshoot_bm_id',
        'nama',
        'company',
        'department',
        'respon',
        'phone',
        'numberId',
        'checkin',
        'photo_checkin',
        'checkout',
        'photo_checkout',
    ];

    public function troubleshootBmId()
    {
        return $this->belongsTo(TroubleshootBm::class, 'troubleshoot_bm_id');
    }
}
