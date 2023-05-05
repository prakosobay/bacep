<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class AccessRequestNumber extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'access_request_numbers';
    protected $fillable = [
        'permit_id',
        'kode',  // BM/IN/EX/VE
        'number', // count number
    ];

    public function cleaningId()
    {
        return $this->hasOne(Cleaning::class, 'permit_id');
    }

    public function otherId()
    {
        return $this->hasOne(Other::class, 'permit_id');
    }
}
