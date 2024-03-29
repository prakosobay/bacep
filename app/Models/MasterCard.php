<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'm_cards';

    public function internals()
    {
        return $this->hasMany(Internal::class);
    }

    public function eksternal()
    {
        return $this->hasMany(Eksternal::class);
    }

    public function cardType()
    {
        return $this->belongsTo(MasterCardType::class, 'card_type_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
