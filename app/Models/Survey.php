<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $guarded = [];
    // protected $casts = [
    //     'visit_name' => AsArrayObject::class,
    //     'visit_nik' => AsArrayObject::class,
    //     'visit_company' => AsArrayObject::class,
    //     'visit_dept' => AsArrayObject::class,
    //     'visit_phone' => AsArrayObject::class,
    //     'pic' => AsCollection::class,
    //     'pic' => 'array',
    // ];



}
