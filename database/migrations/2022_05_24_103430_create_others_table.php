<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('penomoranar_id');
            $table->foreignUuid('penomorancr_id');
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('loc1')->nullable();
            $table->string('loc2', 20)->nullable();
            $table->string('loc3', 20)->nullable();
            $table->string('loc4', 20)->nullable();
            $table->string('loc5', 20)->nullable();
            $table->string('loc6', 20)->nullable();
            $table->string('loc7', 20)->nullable();
            $table->string('loc8', 20)->nullable();
            $table->string('loc9', 20)->nullable();
            $table->string('loc10', 20)->nullable();
            $table->string('loc11', 20)->nullable();
            $table->string('loc12', 20)->nullable();
            $table->string('loc13', 20)->nullable();
            $table->string('loc14', 20)->nullable();
            $table->string('time_start_1');
            $table->string('time_start_2')->nullable();
            $table->string('time_start_3')->nullable();
            $table->string('time_start_4')->nullable();
            $table->string('time_start_5')->nullable();
            $table->string('time_end_1');
            $table->string('time_end_2')->nullable();
            $table->string('time_end_3')->nullable();
            $table->string('time_end_4')->nullable();
            $table->string('time_end_5')->nullable();
            $table->string('activity_1');
            $table->string('activity_2')->nullable();
            $table->string('activity_3')->nullable();
            $table->string('activity_4')->nullable();
            $table->string('activity_5')->nullable();
            $table->string('detail_1');
            $table->string('detail_2')->nullable();
            $table->string('detail_3')->nullable();
            $table->string('detail_4')->nullable();
            $table->string('detail_5')->nullable();
            $table->string('item_1');
            $table->string('item_2')->nullable();
            $table->string('item_3')->nullable();
            $table->string('item_4')->nullable();
            $table->string('item_5')->nullable();
            $table->string('procedure_1');
            $table->string('procedure_2')->nullable();
            $table->string('procedure_3')->nullable();
            $table->string('procedure_4')->nullable();
            $table->string('procedure_5')->nullable();
            $table->string('risk_1');
            $table->string('risk_2')->nullable();
            $table->string('risk_3')->nullable();
            $table->string('risk_4')->nullable();
            $table->string('risk_5')->nullable();
            $table->string('poss_1');
            $table->string('poss_2')->nullable();
            $table->string('poss_3')->nullable();
            $table->string('poss_4')->nullable();
            $table->string('poss_5')->nullable();
            $table->string('impact_1', 6);
            $table->string('impact_2', 6)->nullable();
            $table->string('impact_3', 6)->nullable();
            $table->string('impact_4', 6)->nullable();
            $table->string('impact_5', 6)->nullable();
            $table->string('mitigation_1');
            $table->string('mitigation_2')->nullable();
            $table->string('mitigation_3')->nullable();
            $table->string('mitigation_4')->nullable();
            $table->string('mitigation_5')->nullable();
            $table->string('background');
            $table->string('desc');
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('others');
    }
}
