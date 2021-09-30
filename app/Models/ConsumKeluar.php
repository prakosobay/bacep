<?php

namespace App\Models;

use App\Models\Consum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumKeluar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'consum_keluars';
    protected $fillable = [
        'tanggal',
        'consum_id',
        'nama_barang',
        'jumlah',
        'ket',
        'pencatat'
    ];

    public function keluar()
    {
        return $this->belongsTo(Consum::class);
    }
}
