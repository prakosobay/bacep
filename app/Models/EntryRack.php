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
    protected $fillable = [
        'internal_id',
        'eksternal_id',
        'm_rack_id',
    ];

    public function internalId()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }

    public function eksternalId()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }

    public function mRackId()
    {
        return $this->belongsTo(MasterRack::class, 'm_rack_id');
    }
}
