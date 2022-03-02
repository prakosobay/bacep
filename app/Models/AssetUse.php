<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUse extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'asset_uses';
    protected $fillable = [
        'asset_id',
        'nama_barang',
        'jumlah',
        'ket',
        'pencatat',
        'tanggal'
    ];

    public function asset_id()
    {
        return $this->belongsTo(Asset::class);
    }

}
