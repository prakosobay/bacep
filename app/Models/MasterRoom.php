<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'm_rooms';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function racks()
    {
        return $this->hasMany(Rack::class);
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
