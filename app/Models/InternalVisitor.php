<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalVisitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'internal_id',
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
        'is_done',
    ];
    protected $primaryKey = 'id';
    protected $table = 'internal_visitors';

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }
}
