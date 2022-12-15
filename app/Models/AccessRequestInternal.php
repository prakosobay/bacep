<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessRequestInternal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'access_request_internals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'internal_id',
        'number',
        'month',
        'year',
    ];

    public function internal()
    {
        return $this->belongsTo(internal::class, 'internal_id');
    }
}
