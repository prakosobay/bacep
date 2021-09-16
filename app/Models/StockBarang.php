<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockBarang extends Model
{
    use HasFactory;

    protected $table = 'stock_barangs';
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'satuan',
        'kondisi',
        'notes',
        'lokasi'
    ];

    public function foto()
    {
        return $this->belongsTo(ConsumFoto::class);
    }

    public function masuk()
    {
        return $this->belongsToMany(ConsumMasuk::class);
    }
}
