<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChangeRequestEksternal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'change_request_eksternals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'eksternal_id',
        'number',
        'month',
        'year',
    ];

    public function eksternalId()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }
}
