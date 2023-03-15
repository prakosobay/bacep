<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ColoRisk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colo_risks';
    protected $fillable = [
        'colo_id',
        'm_risk_id',
    ];

    public function coloId()
    {
        return $this->belongsTo(Colo::class, 'colo_id');
    }

    public function mRiskId()
    {
        return $this->belongsTo(MasterRisks::class, 'm_risk_id');
    }
}
