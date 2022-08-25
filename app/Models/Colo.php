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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coloDetail()
    {
        return $this->hasMany(ColoDetail::class);
    }

    public function coloRisk()
    {
        return $this->hasMany(ColoRisk::class);
    }

    public function coloVisitor()
    {
        return $this->hasMany(ColoVisitor::class);
    }

    public function coloHistory()
    {
        return $this->hasMany(ColoHistory::class);
    }

    public function coloCard()
    {
        return $this->hasOne(MasterCard::class);
    }

    public function coloEntry()
    {
        return $this->hasOne(ColoEntry::class);
    }

    public function coloFull()
    {
        return $this->hasOne(ColoFull::class);
    }
}
