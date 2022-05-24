<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiskBm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'risk_bms';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
