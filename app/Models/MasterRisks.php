<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRisks extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'm_risks';
    protected $guarded = [];

    public function internals()
    {
        return $this->hasMany(Internal::class);
    }
}
