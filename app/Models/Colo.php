<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colos';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function details()
    {
        return $this->hasMany(ColoDetail::class);
    }

    public function risks()
    {
        return $this->hasMany(ColoRisk::class);
    }

    public function visitors()
    {
        return $this->hasMany(ColoVisitor::class);
    }

    public function history()
    {
        return $this->hasMany(ColoHistory::class);
    }

    public function card()
    {
        return $this->hasOne(MasterCard::class);
    }

    public function entry()
    {
        return $this->hasOne(ColoEntry::class);
    }

    public function full()
    {
        return $this->hasOne(ColoFull::class);
    }
}
