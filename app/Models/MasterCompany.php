<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterCompany extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'm_companies';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function departments()
    {
        return $this->hasMany(MasterDepartment::class);
    }

    public function racks()
    {
        return $this->hasMany(MasterRack::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
