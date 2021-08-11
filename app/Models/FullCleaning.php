<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullCleaning extends Model
{
    use HasFactory;

    protected $table = 'full_cleanings';
    protected $primaryKey = 'full_c_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'form_c_id',
        'cleaning_date',
        'cleaning_name',
        'cleaning_name2',
        'cleaning_work',
        'status',
        'link',
    ];
}
