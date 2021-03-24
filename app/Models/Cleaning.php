<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{
    use HasFactory;
    protected $table = 'cleanings';
    protected $primaryKey = 'cleaning_id';

    protected $fillable = [
        'cleaning_id',
        'cleaning_work',
        'validity_from',
        'validity_to',
        'server',
        'generator',
        'ups',
        'fss',
        'staging',
        'battery',
        'trafo',
        'mmr1',
        'mmr2',
        'panel',
        'cleaning_background',
        'cleaning_describ',
        'cleaning_risk_1',
        'cleaning_possibility_1',
        'cleaning_impact_1',
        'cleaning_mitigation_1',
        'cleaning_risk_2',
        'cleaning_possibility_2',
        'cleaning_impact_2',
        'cleaning_mitigation_2',
        'cleaning_risk_3',
        'cleaning_possibility_3',
        'cleaning_impact_3',
        'cleaning_mitigation_3',
        'cleaning_risk_4',
        'cleaning_possibility_4',
        'cleaning_impact_4',
        'cleaning_mitigation_4',
        'cleaning_risk_5',
        'cleaning_possibility_5',
        'cleaning_impact_5',
        'cleaning_mitigation_5',
        'cleaning_risk_6',
        'cleaning_possibility_6',
        'cleaning_impact_6',
        'cleaning_mitigation_6',
        'cleaning_item_1',
        'cleaning_procedure_1',
        'cleaning_item_2',
        'cleaning_procedure_2',
        'cleaning_item_3',
        'cleaning_procedure_3',
        'cleaning_item_4',
        'cleaning_procedure_4',
        'cleaning_item_5',
        'cleaning_procedure_5',
        'cleaning_item_6',
        'cleaning_procedure_6',
        'cleaning_testing',
        'cleaning_rollback',
        'cleaning_name_1',
        'cleaning_pt_1',
        'cleaning_number_1',
        'cleaning_id_1',
        'cleaning_name_2',
        'cleaning_pt_2',
        'cleaning_number_2',
        'cleaning_id_2',
        'cleaning_name_3',
        'cleaning_pt_3',
        'cleaning_number_3',
        'cleaning_id_3',
        'cleaning_name_4',
        'cleaning_pt_4',
        'cleaning_number_4',
        'cleaning_id_4'
    ];
}