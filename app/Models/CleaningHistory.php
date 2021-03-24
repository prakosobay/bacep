<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningHistory extends Model
{
    use HasFactory;
    protected $table = 'cleaning_histories';
    protected $primaryKey = 'cleaning_history_id';

    protected $fillable = [
        'cleaning_id',
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
        return $this->belongsTo(Cleaning::class);
    }
}
