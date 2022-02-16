<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consum extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'consums';
    protected $fillable = [
        'itemcode',
        'nama_barang',
        'jumlah',
        'satuan',
        'kondisi',
        'note',
        'lokasi',
    ];
}
