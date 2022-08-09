<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'req_dept',
        'req_name',
        'req_phone',
        'work',
        'visit',
        'leave',
        'background',
        'desc',
        'testing',
        'rollback',
        'rack',
        'card_number',
        'reject_note',
        'req_email',
    ];

    public function visitor()
    {
        return $this->hasMany(InternalVisitor::class);
    }

    public function history()
    {
        return $this->hasMany(InternalHistory::class);
    }

    public function risk()
    {
        return $this->hasMany(InternalRisk::class);
    }

    public function detail()
    {
        return $this->hasMany(InternalDetail::class);
    }

    public function entry()
    {
        return $this->hasOne(InternalEntry::class);
    }

    public function full()
    {
        return $this->hasOne(InternalFull::class);
    }
}
