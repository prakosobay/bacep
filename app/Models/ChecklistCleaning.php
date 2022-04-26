<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistCleaning extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'checklist_cleanings';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
