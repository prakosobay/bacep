<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EksternalRisk extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'eksternal_risks';

    public function eksternal()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }

    public function masterRisk()
    {
        return $this->belongsTo(MasterRisks::class, 'm_risk_id');
    }
}
