<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class Order extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $guarded = [];


    public function orderitem()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function orderhistory()
    {
        return $this->hasMany(OrderHistory::class, 'order_id');
    }
}
