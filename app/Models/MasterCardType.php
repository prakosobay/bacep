<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterCardType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'm_card_types';
    protected $primaryKey = 'id';

    public function card()
    {
        return $this->hasMany(MasterCard::class);
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
