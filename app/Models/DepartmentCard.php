<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'updated_by',
        'created_by',
    ];

    protected $table = 'department_cards';

    public function employees()
    {
        return $this->hasMany(EmployeeCard::class);
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
