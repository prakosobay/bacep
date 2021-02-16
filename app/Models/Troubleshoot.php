<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Troubleshoot extends Model
{
    use HasFactory;
    protected $table = 'troubleshoot';
    protected $primaryKey = 'troubleshoot_id';

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
        'perlatan',
        'kegiatan',
        'kabel',
        'length',
        'qty',
        'area_from',
        'area_to',
        'rack_from',
        'rack_to',
        'jenis_rack',
        'io',
        'merk',
        'serial',
        'jumlah',
        'remarks',
    ];
}
