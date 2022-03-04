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
        'itemcode',
        'jumlah',
        'digunakan',
        'sisa',
        'satuan',
        'kondisi',
        'note',
        'lokasi'
    ];

    public function asset_id()
    {
        return $this->hasMany(AssetKeluar::class);
    }

    public function asset_id2()
    {
        return $this->hasMany(AssetMasuk::class);
    }
}
