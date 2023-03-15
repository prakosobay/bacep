<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ColoDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colo_details';
    protected $fillable = [
        'colo_id',
        'time_start',
        'time_end',
        'activity',
        'item',
        'service_impact',
        'procedure',
    ];

    public function coloId()
    {
        return $this->belongsTo(Colo::class, 'colo_id');
    }
}
