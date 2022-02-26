<?php

namespace App\Models;

use App\Models\Consum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumMasuk extends Model
{
    use HasFactory;

    protected $table = 'consum_masuks';
    protected $primayKey = 'id';
    protected $fillable = [
        'tanggal',
        'itemcode',
        'consum_id',
        'nama_barang',
        'jumlah',
        'ket',
        'pencatat'
    ];

    public function masuk()
    {
        return $this->belongsTo(Consum::class);
    }
}
