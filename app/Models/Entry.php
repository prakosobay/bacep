<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entries';
    protected $fillable = [
        'internal_id',
        'eksternal_id',
        'dc',
        'mmr1',
        'mmr2',
        'cctv',
        'genset',
        'panel',
        'baterai',
        'trafo',
        'ups',
        'fss',
        'office_lt1',
        'parking',
        'yard',
        'lain',
    ];

    public function internalId()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }

    public function eksternalId()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }
}
