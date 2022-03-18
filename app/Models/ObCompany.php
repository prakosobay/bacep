<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObCompany extends Model
{
    use HasFactory;
    protected $table = 'ob_companies';
    protected $primaryKey = 'company_id';

    protected $fillable = [
        'company_id',
        'company',
    ];
}
