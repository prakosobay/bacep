<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ChangeRequestNumber extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'change_request_numbers';
    protected $fillable = [
        'permit_id',
        'kode',
        'number',
    ];
}
