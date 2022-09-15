<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMasuk extends Model
{
    use HasFactory;
    protected $table = 'asset_masuks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'asset_id',
        'nama_barang',
        'jumlah',
        'ket',
        'pencatat',
        'tanggal'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
