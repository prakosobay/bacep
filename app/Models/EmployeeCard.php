<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        // 'name',
        // 'number_card',
        // 'department_card_id',
        // 'deleted_card',
        // 'is_intern',
        // 'updated_by',
        // 'created_by',
    ];

    protected $table = 'employee_cards';

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
