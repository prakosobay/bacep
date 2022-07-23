<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consum extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'consums';
    protected $fillable = [
        'itemcode',
        'nama_barang',
        'jumlah',
        'satuan',
        'kondisi',
        'note',
        'id',
        'lokasi',
    ];
}
