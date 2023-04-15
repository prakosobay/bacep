<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'visitors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'visit_nama',
        'visit_company',
        'visit_department',
        'visit_respon',
        'visit_phone',
        'visit_nik',
    ];

    public function coloVisitors()
    {
        return $this->hasMany(ColoVisitor::class, 'm_visitor_id');
    }
}
