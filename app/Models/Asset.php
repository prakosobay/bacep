<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'assets';
    protected $primaryKey = 'id';
    protected $guarded = [
    ];

    public function keluars()
    {
        return $this->hasMany(AssetKeluar::class);
    }

    public function masuks()
    {
        return $this->hasMany(AssetMasuk::class);
    }

    public function terpakais()
    {
        return $this->hasMany(AssetTerpakai::class);
    }
}
