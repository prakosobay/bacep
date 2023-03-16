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
    protected $fillable = [
        'm_room_id',
        'm_company_id',
        'number',
        'updated_by',
        'created_by,'
    ];

    public function mRoomId()
    {
        return $this->belongsTo(MasterRoom::class, 'm_room_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_at');
    }

    public function mCompanyId()
    {
        return $this->belongsTo(MasterCompany::class, 'm_company_id');
    }
}
