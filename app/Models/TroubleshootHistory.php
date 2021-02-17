<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TroubleshootHistory extends Model
{
    use HasFactory;

    protected $table = 'troubleshoot_histories';
    protected $primaryKey = 'troubleshoot_history_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'troubleshoot_id'
        'created_by',
        'role_to',
        'status'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function troubleshoot()
    {
        return $this->belongsTo(Troubleshoot::class);
    }
}
