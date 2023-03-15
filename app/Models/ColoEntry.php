<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ColoEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colo_entries';
    protected $fillable = [
        'colo_id',
        'm_room_id',
        'm_rack_id',
    ];

    public function coloId()
    {
        return $this->belongsTo(Colo::class, 'colo_id');
    }

    public function mRoomId()
    {
        return $this->belongsTo(MasterRoom::class, 'm_room_id');
    }

    public function mRackId()
    {
        return $this->belongsTo(MasterRack::class, 'm_rack_id');
    }
}
