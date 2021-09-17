<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consum extends Model
{
    use HasFactory;

    protected $primaryKey = 'consum_id';
    protected $table = 'consums';
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'satuan',
        'kondisi',
        'notes',
        'lokasi'
    ];

    public function gambar()
    {
        return $this->belongsTo(ConsumGambar::class);
    }
}
