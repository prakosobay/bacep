<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanWork extends Model
{
    use HasFactory;

    protected $table = 'pilihan_works';
    protected $primaryKey = 'id';

    protected $fillable = [
        'work',
        'loc1',
        'loc2',
        'loc3',
        'loc4',
        'loc5',
        'loc6',
        'background',
        'describ',
        'activity_desciption_1',
        'activity_desciption_2',
        'activity_desciption_3',
        'activity_desciption_4',
        'activity_desciption_5',
        'activity_desciption_6',
        'detail_service_1',
        'detail_service_2',
        'detail_service_3',
        'detail_service_4',
        'detail_service_5',
        'detail_service_6',
        'item_1',
        'item_2',
        'item_3',
        'item_4',
        'item_5',
        'item_6',
        'working_procedure_1',
        'working_procedure_2',
        'working_procedure_3',
        'working_procedure_4',
        'working_procedure_5',
        'working_procedure_6',
        'risk_description_1',
        'risk_description_2',
        'risk_description_3',
        'risk_description_4',
        'risk_description_5',
        'risk_description_6',
        'possibility_1',
        'possibility_2',
        'possibility_3',
        'possibility_4',
        'possibility_5',
        'possibility_6',
        'impact_1',
        'impact_2',
        'impact_3',
        'impact_4',
        'impact_5',
        'impact_6',
        'mitigation_plan_1',
        'mitigation_plan_2',
        'mitigation_plan_3',
        'mitigation_plan_4',
        'mitigation_plan_5',
        'mitigation_plan_6',
        'testing',
        'rollback',

    ];
}
