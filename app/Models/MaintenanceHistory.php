<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceHistory extends Model
{
    use HasFactory;
    protected $table = 'maintenance_histories';
    protected $primaryKey = 'maintenance_history_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'maintenance_id',
        'created_by',
        'role_to',
        'status'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }
}
