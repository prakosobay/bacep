<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'internal_entries';

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }

    public function room()
    {
        return $this->belongsTo(MasterRoom::class, 'm_room_id');
    }

    public function rack()
    {
        return $this->belongsTo(MasterRack::class, 'm_rack_id');
    }
}
