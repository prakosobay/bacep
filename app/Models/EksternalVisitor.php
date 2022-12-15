<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EksternalVisitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'eksternal_id',
        'name',
        'phone',
        'nik',
        'department',
        'company',
        'respon',
        'checkin',
        'photo_checkin',
        'checkout',
        'photo_checkout',
    ];
    protected $primaryKey = 'id';
    protected $table = 'eksternal_visitors';

    public function eksternal()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }
}
