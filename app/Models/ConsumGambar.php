<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumGambar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'consum_gambars';
    protected $fillable = [
        'consum_id',
        'file',
        'ket',
    ];
}
