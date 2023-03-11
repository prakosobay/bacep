<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRisks extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'm_risks';
    protected $fillable = [
        'name',
        'risk',
        'poss',
        'impact',
        'mitigation',
        'updated_by',
        'created_by',
    ];

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
