<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilihanWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_works', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('work');
            $table->string('loc1', 20);
            $table->string('loc2', 20)->nullable();
            $table->string('loc3', 20)->nullable();
            $table->string('loc4', 20)->nullable();
            $table->string('loc5', 20)->nullable();
            $table->string('loc6', 20)->nullable();
            $table->string('background');
            $table->text('describ');
            $table->string('activity_desciption_1', 100);
            $table->string('activity_desciption_2', 100)->nullable();
            $table->string('activity_desciption_3', 100)->nullable();
            $table->string('activity_desciption_4', 100)->nullable();
            $table->string('activity_desciption_5', 100)->nullable();
            $table->string('activity_desciption_6', 100)->nullable();
            $table->string('detail_service_1', 100);
            $table->string('detail_service_2', 100)->nullable();
            $table->string('detail_service_3', 100)->nullable();
            $table->string('detail_service_4', 100)->nullable();
            $table->string('detail_service_5', 100)->nullable();
            $table->string('detail_service_6', 100)->nullable();
            $table->string('item_1', 100);
            $table->string('item_2', 100)->nullable();
            $table->string('item_3', 100)->nullable();
            $table->string('item_4', 100)->nullable();
            $table->string('item_5', 100)->nullable();
            $table->string('item_6', 100)->nullable();
            $table->string('working_procedure_1', 100);
            $table->string('working_procedure_2', 100)->nullable();
            $table->string('working_procedure_3', 100)->nullable();
            $table->string('working_procedure_4', 100)->nullable();
            $table->string('working_procedure_5', 100)->nullable();
            $table->string('working_procedure_6', 100)->nullable();
            $table->string('risk_description_1', 100);
            $table->string('risk_description_2', 100)->nullable();
            $table->string('risk_description_3', 100)->nullable();
            $table->string('risk_description_4', 100)->nullable();
            $table->string('risk_description_5', 100)->nullable();
            $table->string('risk_description_6', 100)->nullable();
            $table->string('possibility_1', 100);
            $table->string('possibility_2', 100)->nullable();
            $table->string('possibility_3', 100)->nullable();
            $table->string('possibility_4', 100)->nullable();
            $table->string('possibility_5', 100)->nullable();
            $table->string('possibility_6', 100)->nullable();
            $table->string('impact_1', 7);
            $table->string('impact_2', 7)->nullable();
            $table->string('impact_3', 7)->nullable();
            $table->string('impact_4', 7)->nullable();
            $table->string('impact_5', 7)->nullable();
            $table->string('impact_6', 7)->nullable();
            $table->string('mitigation_plan_1', 100);
            $table->string('mitigation_plan_2', 100)->nullable();
            $table->string('mitigation_plan_3', 100)->nullable();
            $table->string('mitigation_plan_4', 100)->nullable();
            $table->string('mitigation_plan_5', 100)->nullable();
            $table->string('mitigation_plan_6', 100)->nullable();
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
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
        Schema::dropIfExists('pilihan_works');
    }
}
