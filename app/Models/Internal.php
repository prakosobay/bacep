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
        return $this->hasMany(InternalVisitor::class);
    }

    public function histories()
    {
        return $this->hasMany(InternalHistory::class);
    }

    public function details()
    {
        return $this->hasMany(InternalDetail::class);
    }

    public function entry()
    {
        return $this->hasMany(InternalEntry::class);
    }

    public function risks()
    {
        return $this->hasMany(InternalRisk::class);
    }

    public function full()
    {
        return $this->hasOne(InternalFull::class);
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
}
