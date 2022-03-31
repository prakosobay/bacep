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
        'cleaning_id',
        'cleaning_date',
        'validity_from',
        'validity_to',
        'cleaning_work',
        'status',
        'link',
        'cleaning_name',
        'cleaning_name2',
    ];
}
