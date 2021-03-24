<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningFull extends Model
{
    use HasFactory;
    protected $table = 'cleaning_fulls';
    protected $primaryKey = 'cleaning_full_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cleaning_full_id',
        'cleaning_id',
        'cleaning_name_1',
        'cleaning_name_1',
        'cleaning_work',
        'status',
        'link',
    ];
}
