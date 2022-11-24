<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'number_card',
        'department_card_id',
        'deleted_card',
        'is_employee',
        'is_intern',
        'created_by',
        'updated_by',
    ];

    protected $table = 'employee_cards';

    public function departmentCardId()
    {
        return $this->belongsTo(DepartmentCard::class, 'department_card_id');
    }
}
