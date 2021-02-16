<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceHistory extends Model
{
    use HasFactory;
    protected $table = 'maintenance_histories';
    protected $primaryKey = 'maintenance_history_id';

    protected $fillable = [
        'maintenance_id',
        'created_by',
        'status'
    ];
}
