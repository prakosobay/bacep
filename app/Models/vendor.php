<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vendors';
    protected $guarded = [];

    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function histories()
    {
        return $this->hasMany(VendorHistory::class);
    }

    public function risks()
    {
        return $this->hasMany(VendorRisk::class);
    }

    public function details()
    {
        return $this->hasMany(VendorDetail::class);
    }

    public function visitors()
    {
        return $this->hasMany(VendorVisitor::class);
    }

    public function entryRacks()
    {
        return $this->hasMany(EntryRack::class, 'eksternal_id');
    }

    public function full()
    {
        return $this->hasOne(VendorFull::class);
    }

    public function entry()
    {
        return $this->hasOne(Entry::class, 'eksternal_id');
    }

    public function ar_eksternal()
    {
        return $this->hasOne(AccessRequestEksternal::class, 'eksternal_id');
    }

    public function cr_eksternal()
    {
        return $this->hasOne(ChangeRequestEksternal::class, 'eksternal_id');
    }
}
