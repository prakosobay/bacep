<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class OrderItem extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];
    protected $primaryKey = 'id';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
