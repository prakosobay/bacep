<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EksternalDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'eksternal_id',
        'time_start',
        'time_end',
        'activity',
        'item',
        'service_impact',
    ];
    protected $table = 'eksternal_details';
    protected $primaryKey = 'id';

    public function eksternal()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }
}
