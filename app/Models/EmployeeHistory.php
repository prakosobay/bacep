<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employee_histories';
    protected $fillable = [
        'last_card',
        'employee_card_id',
        'name',
        'status',
    ];
    protected $primaryKey = 'id';

    public function employeeCardId()
    {
        return $this->belongsTo(EmployeeCard::class, 'employee_card_id');
    }
}
