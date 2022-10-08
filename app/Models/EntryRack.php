<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryRack extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entry_racks';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }

    public function eksternal()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }

    public function rack()
    {
        return $this->belongsTo(MasterRack::class, 'm_rack_id');
    }
}
