<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterOb extends Model
{
    use HasFactory;
    protected $table = 'master_obs';
    protected $primaryKey = 'ob_id';

    protected $fillable = [
        'ob_id',
        'nama',
        'id_number',
        'phone_number',
    ];

    public function company()
    {
        return $this->belongsTo(ObCompany::class);
    }
}
