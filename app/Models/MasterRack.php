<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRack extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'm_racks';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(MasterRoom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(MasterCompany::class);
    }

    public function colos()
    {
        return $this->hasMany(Colo::class);
    }
}
