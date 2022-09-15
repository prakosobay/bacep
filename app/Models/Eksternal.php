<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eksternal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'eksternals';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function card()
    {
        return $this->belongsTo(MasterCard::class, 'm_card_id');
    }

    public function penomoranAR()
    {
        return $this->belongsTo(PenomoranAR::class, 'penomoranar_id');
    }

    public function penomoranCR()
    {
        return $this->belongsTo(PensomoranCR::class, 'penomorancr_id');
    }

    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function full()
    {
        return $this->hasOne(EksternalFull::class);
    }

    public function entry()
    {
        return $this->hasOne(EksternalEntry::class);
    }

    public function details()
    {
        return $this->hasMany(EksternalDetail::class);
    }

    public function risks()
    {
        return $this->hasMany(EksternalRisk::class);
    }

    public function visitors()
    {
        return $this->hasMany(EksternalVisitor::class);
    }

    public function histories()
    {
        return $this->hasMany(EksternalHistory::class);
    }
}
