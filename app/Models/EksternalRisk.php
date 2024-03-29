<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EksternalRisk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'eksternal_id',
        'm_risk_id',
    ];
    protected $primaryKey = 'id';
    protected $table = 'eksternal_risks';

    public function eksternalId()
    {
        return $this->belongsTo(Eksternal::class, 'eksternal_id');
    }

    public function mRiskId()
    {
        return $this->belongsTo(MasterRisks::class, 'm_risk_id');
    }
}
