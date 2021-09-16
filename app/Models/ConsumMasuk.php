<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumMasuk extends Model
{
    use HasFactory;

    protected $table = 'consum_masuks';
    protected $fillable = [
        'masuk',
        'jumlah',
        'ket',
        'pencatat',
    ];

    public function masuk()
    {
        return $this->belongsTo(Consum::class);
    }

    public function pencatat()
    {
        return $this->belongsTo(User::class);
    }
}
