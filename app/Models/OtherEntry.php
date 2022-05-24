<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'other_entries';
    protected $primaryKey = 'id';
    protected $guarded = [];

    // public function other_form()
    // {
    //     return $this->belongsTo(Other::class);
    // }
}
