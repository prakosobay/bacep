<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mounting extends Model
{
    use HasFactory;

    protected $table = 'mounting';
    protected $primaryKey = 'mounting_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal',
        'bulan',
        'tahun',
        'purpose_work',
        'visitor_name',
        'visitor_company',
        'visitor_id',
        'visitor_department',
        'visitor_phone',
        'validity',
        'time_in',
        'time_out',
        'lokasi',
        'akses',
        'background_objective',
        'description_work',
        'resiko_dampak',
        'peralatan',
        'kegiatan',
        'kabel',
        'length',
        'qty',
        'area_from',
        'area_to',
        'jenis_rack',
        'rack_from',
        'rack_to',
        'io',
        'merk',
        'serial',
        'jumlah',
        'remarks',
    ];
}
