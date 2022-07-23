<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalEntry extends Model
{
    use HasFactory;

    protected $table = 'internal_entries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'req_dept', 'dc', 'mmr1', 'mmr2', 'cctv', 'lain'
    ];
}
