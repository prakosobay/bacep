<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ColoVisitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colo_visitors';
    protected $fillable = [
        'colo_id',
        'm_visitor_id',
        'checkin',
        'photo_checkin',
        'checkout',
        'photo_checkout',
        'done',
    ];

    public function coloId()
    {
        return $this->belongsTo(Colo::class, 'colo_id');
    }

    public function mVisitorId()
    {
        return $this->belongsTo(Visitor::class, 'm_visitor_id');
    }
}
