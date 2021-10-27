<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genset extends Model
{
    use HasFactory;

    protected $table = 'gensets';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
