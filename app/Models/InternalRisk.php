<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalRisk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'internal_id',
        'm_risk_id',
    ];
    protected $primaryKey = 'id';
    protected $table = 'internal_risks';

    public function internal()
    {
        return $this->belongsTo(Internal::class, 'internal_id');
    }

    public function masterRisk()
    {
        return $this->belongsTo(MasterRisks::class, 'm_risk_id');
    }
}
