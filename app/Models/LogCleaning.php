<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogCleaning extends Model
{
    use HasFactory;

    protected $table = 'log_cleanings';
    protected $primaryKey = 'log_c_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'form_c_id',
        'created_by',
        'role_to',
        'status',
        'aktif',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function form_cleaning()
    {
        return $this->belongsTo(FormCleaning::class);
    }
}
