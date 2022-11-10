<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function visitors()
    {
        return $this->hasMany(InternalVisitor::class, 'internal_id');
    }

    public function histories()
    {
        return $this->hasMany(InternalHistory::class, 'internal_id');
    }

    public function details()
    {
        return $this->hasMany(InternalDetail::class, 'internal_id');
    }

    public function risks()
    {
        return $this->hasMany(InternalRisk::class, 'internal_id');
    }

    public function full()
    {
        return $this->hasOne(InternalFull::class, 'internal_id');
    }

    public function card()
    {
        return $this->belongsTo(MasterCard::class, 'm_card_id');
    }

    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function ar_internal()
    {
        return $this->hasOne(AccessRequestInternal::class);
    }

    public function cr_internal()
    {
        return $this->hasOne(ChangeRequestInternal::class);
    }

    public function entry()
    {
        return $this->hasOne(Entry::class, 'internal_id');
    }

    public function racks()
    {
        return $this->hasMany(EntryRack::class, 'internal_id');
    }
}
