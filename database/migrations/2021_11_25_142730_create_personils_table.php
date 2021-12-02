<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personil', function (Blueprint $table) {
            $table->id();
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
            $table->string('vaksina_1');
            $table->string('vaksina_2')->nullable();
            $table->string('vaksina_3')->nullable();
            $table->string('vaksina_4')->nullable();
            $table->string('vaksina_5')->nullable();
            $table->string('vaksinb_1');
            $table->string('vaksinb_2')->nullable();
            $table->string('vaksinb_3')->nullable();
            $table->string('vaksinb_4')->nullable();
            $table->string('vaksinb_5')->nullable();
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
        Schema::dropIfExists('personil');
    }
}
