<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Closure;

class Other extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function personils()
    {
        return $this->hasMany(OtherPersonil::class, 'other_id');
    }

    public function histories()
    {
        return $this->hasMany(OtherHistory::class, 'other_id');
    }

    public function full()
    {
        return $this->hasOne(OtherFull::class);
    }

    public function penomoranAR()
    {
        return $this->belongsTo(PenomoranAR::class, 'penomoranar_id');
    }

    public function penomoranCR()
    {
        return $this->belongsTo(PenomoranCR::class, 'penomorancr_id');
    }

    // public function whereHas($relation, Closure $callback = null, $operator = '>=', $count = 1)
    // {
    //     return $this->has($relation, $operator, $count, 'and', $callback);
    // }
}
