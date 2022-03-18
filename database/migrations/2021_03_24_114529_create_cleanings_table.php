<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleanings', function (Blueprint $table) {
            $table->increments('cleaning_id');
            $table->string('cleaning_work');
            $table->string('validity_from');
            $table->string('validity_to');
            $table->boolean('server');
            $table->boolean('generator');
            $table->boolean('ups');
            $table->boolean('fss');
            $table->boolean('staging');
            $table->boolean('battery');
            $table->boolean('trafo');
            $table->boolean('mmr1');
            $table->boolean('mmr2');
            $table->boolean('panel');
            $table->string('cleaning_background');
            $table->string('cleaning_describ');
            $table->string('cleaning_risk_1');
            $table->string('cleaning_possibility_1');
            $table->string('cleaning_impact_1');
            $table->string('cleaning_mitigation_1');
            $table->string('cleaning_risk_2');
            $table->string('cleaning_possibility_2');
            $table->string('cleaning_impact_2');
            $table->string('cleaning_mitigation_2');
            $table->string('cleaning_risk_3');
            $table->string('cleaning_possibility_3');
            $table->string('cleaning_impact_3');
            $table->string('cleaning_mitigation_3');
            $table->string('cleaning_risk_4');
            $table->string('cleaning_possibility_4');
            $table->string('cleaning_impact_4');
            $table->string('cleaning_mitigation_4');
            $table->string('cleaning_risk_5')->nullable();
            $table->string('cleaning_possibility_5')->nullable();
            $table->string('cleaning_impact_5')->nullable();
            $table->string('cleaning_mitigation_5')->nullable();
            $table->string('cleaning_risk_6')->nullable();
            $table->string('cleaning_possibility_6')->nullable();
            $table->string('cleaning_impact_6')->nullable();
            $table->string('cleaning_mitigation_6')->nullable();
            $table->string('cleaning_item_1');
            $table->string('cleaning_procedure_1');
            $table->string('cleaning_item_2');
            $table->string('cleaning_procedure_2');
            $table->string('cleaning_item_3');
            $table->string('cleaning_procedure_3');
            $table->string('cleaning_item_4');
            $table->string('cleaning_procedure_4');
            $table->string('cleaning_item_5')->nullable();
            $table->string('cleaning_procedure_5')->nullable();
            $table->string('cleaning_item_6')->nullable();
            $table->string('cleaning_procedure_6')->nullable();
            $table->string('cleaning_testing')->nullable();
            $table->string('cleaning_rollback')->nullable();
            $table->string('cleaning_name_1');
            $table->string('cleaning_number_1');
            $table->string('cleaning_id_1');
            $table->string('cleaning_name_2');
            $table->string('cleaning_number_2');
            $table->string('cleaning_id_2');
            $table->string('cleaning_name_3')->nullable();
            $table->string('cleaning_number_3')->nullable();
            $table->string('cleaning_id_3')->nullable();
            $table->string('cleaning_name_4')->nullable();
            $table->string('cleaning_number_4')->nullable();
            $table->string('cleaning_id_4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleanings');
    }
}
