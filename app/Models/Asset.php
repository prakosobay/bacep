<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_barang',
        'quantity',
        'satuan',
        'kondisi',
        'note',
        'lokasi',
    ];
}
