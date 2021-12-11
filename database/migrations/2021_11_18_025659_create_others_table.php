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
        Schema::create('other', function (Blueprint $table) {
            $table->id('other_id');
            $table->string('other_work');
            $table->date('val_from', 20);
            $table->date('val_to', 20);
            $table->string('loc1')->nullable();//other
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
            $table->timeTz('time_1', 6);
            $table->timeTz('time_2', 6)->nullable();
            $table->timeTz('time_3', 6)->nullable();
            $table->timeTz('time_4', 6)->nullable();
            $table->timeTz('time_5', 6)->nullable();
            $table->string('procedure_1');
            $table->string('procedure_2')->nullable();
            $table->string('procedure_3')->nullable();
            $table->string('procedure_4')->nullable();
            $table->string('procedure_5')->nullable();
            $table->string('item_1');
            $table->string('item_2')->nullable();
            $table->string('item_3')->nullable();
            $table->string('item_4')->nullable();
            $table->string('item_5')->nullable();
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
            $table->string('desc', 1000);
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
            $table->string('pic1');
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->string('pic4')->nullable();
            $table->string('pic5')->nullable();
            $table->string('company_1', 100);
            $table->string('company_2', 100)->nullable();
            $table->string('company_3', 100)->nullable();
            $table->string('company_4', 100)->nullable();
            $table->string('company_5', 100)->nullable();
            $table->string('department_1', 100);
            $table->string('department_2', 100)->nullable();
            $table->string('department_3', 100)->nullable();
            $table->string('department_4', 100)->nullable();
            $table->string('department_5', 100)->nullable();
            $table->string('respon_1', 100);
            $table->string('respon_2', 100)->nullable();
            $table->string('respon_3', 100)->nullable();
            $table->string('respon_4', 100)->nullable();
            $table->string('respon_5', 100)->nullable();
            $table->string('phone_1', 13);
            $table->string('phone_2', 13)->nullable();
            $table->string('phone_3', 13)->nullable();
            $table->string('phone_4', 13)->nullable();
            $table->string('phone_5', 13)->nullable();
            $table->unsignedBigInteger('id_1');
            $table->unsignedBigInteger('id_2')->nullable();
            $table->unsignedBigInteger('id_3')->nullable();
            $table->unsignedBigInteger('id_4')->nullable();
            $table->unsignedBigInteger('id_5')->nullable();
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
        Schema::dropIfExists('other');
    }
}
