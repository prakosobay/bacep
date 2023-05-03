<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Colo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colos';
    protected $fillable = [
        'requestor_id',
        'work',
        'visit',
        'leave',
        'background',
        'desc',
        'testing',
        'rollback',
        'reject_note',
        'm_card_id',
        'is_survey',
    ];

    public function requestorId()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function mCardId()
    {
        return $this->belongsTo(MasterCard::class, 'm_card_id');
    }

    public function coloFull()
    {
        return $this->hasOne(ColoFull::class, 'colo_id');
    }

    public function histories()
    {
        return $this->hasMany(ColoHistory::class, 'colo_id');
    }

    public function coloEntries()
    {
        return $this->hasMany(ColoEntry::class, 'colo_id');
    }

    public function coloRisks()
    {
        return $this->hasMany(ColoRisk::class, 'colo_id');
    }

    public function coloDetails()
    {
        return $this->hasMany(ColoDetail::class, 'colo_id');
    }

    public function coloVisitors()
    {
        return $this->hasMany(ColoVisitor::class, 'colo_id');
    }
}
