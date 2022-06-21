<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootBm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'troubleshoot_bms';
    protected $primaryKey = 'id';
    protected $guarded = [];

    // public function troubleshoot_bm_entry()
    // {
    //     return $this->hasOne(TroubleshootBmEntry::class);
    // }
}
