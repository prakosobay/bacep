<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCard extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'm_cards';

    public function internals()
    {
        return $this->hasMany(Internal::class);
    }
}
