<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'internal_id',
        'time_start',
        'time_end',
        'activity',
        'item',
        'service_impact',
    ];
    protected $primaryKey = 'id';
    protected $table = 'internal_details';

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }
}
