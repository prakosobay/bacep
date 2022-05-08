<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CleaningFull extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cleaning_fulls';
    protected $primaryKey = 'cleaning_full_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];
}
