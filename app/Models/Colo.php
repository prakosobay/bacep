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
}
