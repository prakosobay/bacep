<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDetail extends Model
{
    use HasFactory;
    protected $table = 'vendor_details';
    protected $primaryKey = 'id';
    protected $guarded =
    [
        'id','vendor_id','time_star','time_end','activity','item','servis_impact'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

}



