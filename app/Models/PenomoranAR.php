<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenomoranAR extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $table = 'penomoran_ars';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cleaning()
    {
        return $this->hasOne(Cleaning::class, 'penomoranar_id');
    }

    public function other()
    {
        return $this->hasOne(Other::class, 'penomoranar_id');
    }

    public function troubleshoot()
    {
        return $this->hasOne(TroubleshootBm::class, 'penomoranar_id');
    }

    public function internal()
    {
        return $this->hasOne(Internal::class, 'penomoranar_id');
    }

    public function survey()
    {
        return $this->hasOne(Survey::class, 'penomoranar_id');
    }
}
