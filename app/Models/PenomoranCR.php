<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenomoranCR extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $table = 'penomoran_crs';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function cleaning()
    {
        return $this->hasOne(Cleaning::class, 'penomorancr_id');
    }

    public function other()
    {
        return $this->hasOne(Other::class, 'penomorancr_id');
    }

    public function troubleshoot()
    {
        return $this->hasOne(TroubleshootBm::class, 'penomorancr_id');
    }

    public function internal()
    {
        return $this->hasOne(Internal::class, 'penomorancr_id');
    }

    public function survey()
    {
        return $this->hasOne(Survey::class, 'penomorancr_id');
    }
}
