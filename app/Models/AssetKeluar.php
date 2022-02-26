<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetKeluar extends Model
{
    use HasFactory;

    protected $table = 'asset_keluars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'asset_id',
        'itemcode',
        'nama_barang',
        'jumlah',
        'ket',
        'pencatat',
        'tanggal'
    ];

    public function asset_id2()
    {
        return $this->belongsTo(Asset::class);
    }
}
