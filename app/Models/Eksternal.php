<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;

class Eksternal extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'eksternals';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function card()
    {
        return $this->belongsTo(MasterCard::class, 'm_card_id');
    }

    public function details()
    {
        return $this->hasMany(EksternalDetail::class, 'eksternal_id');
    }

    public function risks()
    {
        return $this->hasMany(EksternalRisk::class, 'eksternal_id');
    }

    public function full()
    {
        return $this->hasOne(EksternalFull::class, 'eksternal_id');
    }

    public function visitors()
    {
        return $this->hasMany(EksternalVisitor::class, 'eksternal_id');
    }

    public function histories()
    {
        return $this->hasMany(EksternalHistory::class, 'eksternal_id');
    }

    public function entryRacks()
    {
        return $this->hasMany(EntryRack::class, 'eksternal_id');
    }

    public function entry()
    {
        return $this->hasOne(Entry::class, 'eksternal_id');
    }
}
