<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalRisk extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_id',
        'req_dept',
        'risk',
        'poss',
        'impact',
        'mitigation',
    ];

    public function internal()
    {
        return $this->belongsTo(Internal::class);
    }


}
