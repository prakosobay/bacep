<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumMasuk extends Model
{
    use HasFactory;

    protected $table = 'consum_masuks';
    protected $primayKey = 'id';
    protected $fillable = [
        'tanggal',
        'nama_barang',
        'jumlah',
        'ket',
        'pencatat'
    ];
}
