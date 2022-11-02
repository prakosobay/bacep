<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EksternalVisitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'eksternal_visitors';

    public function eksternal()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }
}
