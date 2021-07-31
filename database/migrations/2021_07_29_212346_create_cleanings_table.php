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
            $table->bigIncrements('cleaning_id')->unique();
            $table->string('cleaning_work');
            $table->string('loc1', 30)->nullable();
            $table->string('loc2', 30)->nullable();
            $table->string('loc3', 30)->nullable();
            $table->string('loc4', 30)->nullable();
            $table->string('loc5', 30)->nullable();
            $table->string('loc6', 30)->nullable();
            $table->string('cleaning_time_start', 6);
            $table->string('cleaning_time_start2', 6)->nullable();
            $table->string('cleaning_time_start3', 6)->nullable();
            $table->string('cleaning_time_start4', 6)->nullable();
            $table->string('cleaning_time_start5', 6)->nullable();
            $table->string('cleaning_time_start6', 6)->nullable();
            $table->string('cleaning_time_end', 6);
            $table->string('cleaning_time_end2', 6)->nullable();
            $table->string('cleaning_time_end3', 6)->nullable();
            $table->string('cleaning_time_end4', 6)->nullable();
            $table->string('cleaning_time_end5', 6)->nullable();
            $table->string('cleaning_time_end6', 6)->nullable();
            $table->string('activity', 100);
            $table->string('activity2', 100)->nullable();
            $table->string('activity3', 100)->nullable();
            $table->string('activity4', 100)->nullable();
            $table->string('activity5', 100)->nullable();
            $table->string('activity6', 100)->nullable();
            $table->string('detail_service', 100);
            $table->string('detail_service2', 100)->nullable();
            $table->string('detail_service3', 100)->nullable();
            $table->string('detail_service4', 100)->nullable();
            $table->string('detail_service5', 100)->nullable();
            $table->string('detail_service6', 100)->nullable();
            $table->string('item', 100);
            $table->string('item2', 100)->nullable();
            $table->string('item3', 100)->nullable();
            $table->string('item4', 100)->nullable();
            $table->string('item5', 100)->nullable();
            $table->string('item6', 100)->nullable();
            $table->string('cleaning_procedure', 100);
            $table->string('cleaning_procedure2', 100)->nullable();
            $table->string('cleaning_procedure3', 100)->nullable();
            $table->string('cleaning_procedure4', 100)->nullable();
            $table->string('cleaning_procedure5', 100)->nullable();
            $table->string('cleaning_procedure6', 100)->nullable();
            $table->string('cleaning_risk', 100);
            $table->string('cleaning_risk2', 100)->nullable();
            $table->string('cleaning_risk3', 100)->nullable();
            $table->string('cleaning_risk4', 100)->nullable();
            $table->string('cleaning_risk5', 100)->nullable();
            $table->string('cleaning_risk6', 100)->nullable();
            $table->string('cleaning_possibility', 100);
            $table->string('cleaning_possibility2', 100)->nullable();
            $table->string('cleaning_possibility3', 100)->nullable();
            $table->string('cleaning_possibility4', 100)->nullable();
            $table->string('cleaning_possibility5', 100)->nullable();
            $table->string('cleaning_possibility6', 100)->nullable();
            $table->string('cleaning_impact', 7);
            $table->string('cleaning_impact2', 7)->nullable();
            $table->string('cleaning_impact3', 7)->nullable();
            $table->string('cleaning_impact4', 7)->nullable();
            $table->string('cleaning_impact5', 7)->nullable();
            $table->string('cleaning_impact6', 7)->nullable();
            $table->string('cleaning_mitigation', 100);
            $table->string('cleaning_mitigation2', 100)->nullable();
            $table->string('cleaning_mitigation3', 100)->nullable();
            $table->string('cleaning_mitigation4', 100)->nullable();
            $table->string('cleaning_mitigation5', 100)->nullable();
            $table->string('cleaning_mitigation6', 100)->nullable();
            $table->string('cleaning_background');
            $table->string('cleaning_describ');
            $table->string('cleaning_testing')->nullable();
            $table->string('cleaning_rollback')->nullable();
            $table->string('validity_from', 20);
            $table->string('validity_to', 20);
            $table->string('cleaning_name', 50);
            $table->string('cleaning_name2', 50);
            $table->string('cleaning_number', 20);
            $table->string('cleaning_number2', 20);
            $table->string('cleaning_nik', 20);
            $table->string('cleaning_nik_2', 20);
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
