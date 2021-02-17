<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MountingHistory extends Model
{
    use HasFactory;

    protected $table = 'mounting_histories';
    protected $primaryKey = 'mounting_history_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'mounting_id',
        'created_by',
        'role_to',
        'status'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function mounting()
    {
        return $this->belongsTo(Mounting::class);
    }
}
