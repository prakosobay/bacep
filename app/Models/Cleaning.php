<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{
    use HasFactory;

    protected $table = 'cleanings';
    protected $primaryKey = 'cleaning_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'cleaning_id',
        'cleaning_work',
        'loc1',
        'loc2',
        'loc3',
        'loc4',
        'loc5',
        'loc6',
        'cleaning_time_start',
        'cleaning_time_start2',
        'cleaning_time_start3',
        'cleaning_time_start4',
        'cleaning_time_start5',
        'cleaning_time_start6',
        'cleaning_time_end',
        'cleaning_time_end2',
        'cleaning_time_end3',
        'cleaning_time_end4',
        'cleaning_time_end5',
        'cleaning_time_end6',
        'activity',
        'activity2',
        'activity3',
        'activity4',
        'activity5',
        'activity6',
        'detail_service',
        'detail_service2',
        'detail_service3',
        'detail_service4',
        'detail_service5',
        'detail_service6',
        'item',
        'item2',
        'item3',
        'item4',
        'item5',
        'item6',
        'cleaning_procedure',
        'cleaning_procedure2',
        'cleaning_procedure3',
        'cleaning_procedure4',
        'cleaning_procedure5',
        'cleaning_procedure6',
        'cleaning_risk',
        'cleaning_risk2',
        'cleaning_risk3',
        'cleaning_risk4',
        'cleaning_risk5',
        'cleaning_risk6',
        'cleaning_possibility',
        'cleaning_possibility2',
        'cleaning_possibility3',
        'cleaning_possibility4',
        'cleaning_possibility5',
        'cleaning_possibility6',
        'cleaning_impact',
        'cleaning_impact2',
        'cleaning_impact3',
        'cleaning_impact4',
        'cleaning_impact5',
        'cleaning_impact6',
        'cleaning_mitigation',
        'cleaning_mitigation2',
        'cleaning_mitigation3',
        'cleaning_mitigation4',
        'cleaning_mitigation5',
        'cleaning_mitigation6',
        'cleaning_background',
        'cleaning_describ',
        'cleaning_testing',
        'cleaning_rollback',
        'validity_from',
        'validity_to',
        'cleaning_name',
        'cleaning_name2',
        'cleaning_number',
        'cleaning_number2',
        'cleaning_nik',
        'cleaning_nik_2',
    ];

    public function histories()
    {
        return $this->hasMany(CleaningHistory::class);
    }

    public function visitors()
    {
        return $this->hasMany(CleaningVisitor::class);
    }

    public function full()
    {
        return $this->hasOne(CleaningFull::class);
    }

    public function penomoranCleaning()
    {
        return $this->hasOne(PenomoranCleaning::class, 'cleaning_id');
    }
}
