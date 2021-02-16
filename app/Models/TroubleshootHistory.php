<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TroubleshootHistory extends Model
{
    use HasFactory;

    protected $table = 'troubleshoot_histories';
    protected $primaryKey = 'troubleshoot_history_id';

    protected $fillable = [
        'troubleshoot_id',
        'created_by',
        'status'
    ];
}
