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
            $table->string('val_from', 20);
            $table->string('val_to', 20);
            $table->boolean('server', false)->nullable();
            $table->boolean('genset', false)->nullable();
            $table->boolean('mmr1', false)->nullable();
            $table->boolean('mmr2', false)->nullable();
            $table->boolean('fss', false)->nullable();
            $table->boolean('batre', false)->nullable();
            $table->boolean('ups', false)->nullable();
            $table->boolean('2nd', false)->nullable();
            $table->boolean('3rd', false)->nullable();
            $table->boolean('trafo', false)->nullable();
            $table->boolean('parking', false)->nullable();
            $table->boolean('yard', false)->nullable();
            $table->boolean('panel', false)->nullable();
            $table->string('other')->nullable();
            $table->timeTz('time_1');
            $table->timeTz('time_2');
            $table->timeTz('time_3')->nullable();
            $table->timeTz('time_4')->nullable();
            $table->timeTz('time_5')->nullable();
            $table->string('item_1');
            $table->string('item_2');
            $table->string('item_3')->nullable();
            $table->string('item_4')->nullable();
            $table->string('item_5')->nullable();
            $table->string('procedure_1');
            $table->string('procedure_2');
            $table->string('procedure_3')->nullable();
            $table->string('procedure_4')->nullable();
            $table->string('procedure_5')->nullable();
            $table->string('risk_1');
            $table->string('risk_2');
            $table->string('risk_3')->nullable();
            $table->string('risk_4')->nullable();
            $table->string('risk_5')->nullable();
            $table->string('poss_1');
            $table->string('poss_2');
            $table->string('poss_3')->nullable();
            $table->string('poss_4')->nullable();
            $table->string('poss_5')->nullable();
            $table->string('impact_1', 6);
            $table->string('impact_2', 6);
            $table->string('impact_3', 6)->nullable();
            $table->string('impact_4', 6)->nullable();
            $table->string('impact_5', 6)->nullable();
            $table->string('mitigation_1');
            $table->string('mitigation_2');
            $table->string('mitigation_3')->nullable();
            $table->string('mitigation_4')->nullable();
            $table->string('mitigation_5')->nullable();
            $table->string('cleaning_describ');
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
            $table->string('name_1');
            $table->string('name_2')->nullable();
            $table->string('name_3')->nullable();
            $table->string('name_4')->nullable();
            $table->string('name_5')->nullable();
            $table->string('company_1');
            $table->string('company_2')->nullable();
            $table->string('company_3')->nullable();
            $table->string('company_4')->nullable();
            $table->string('company_5')->nullable();
            $table->string('department_1');
            $table->string('department_2')->nullable();
            $table->string('department_3')->nullable();
            $table->string('department_4')->nullable();
            $table->string('department_5')->nullable();
            $table->string('respon_1');
            $table->string('respon_2')->nullable();
            $table->string('respon_3')->nullable();
            $table->string('respon_4')->nullable();
            $table->string('respon_5')->nullable();
            $table->string('phone_1', 14);
            $table->string('phone_2', 14)->nullable();
            $table->string('phone_3', 14)->nullable();
            $table->string('phone_4', 14)->nullable();
            $table->string('phone_5', 14)->nullable();
            $table->string('id_1', 16);
            $table->string('id_2', 16)->nullable();
            $table->string('id_3', 16)->nullable();
            $table->string('id_4', 16)->nullable();
            $table->string('id_5', 16)->nullable();
            $table->string('ktp_1');
            $table->string('ktp_2')->nullable();
            $table->string('ktp_3')->nullable();
            $table->string('ktp_4')->nullable();
            $table->string('ktp_5')->nullable();
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
