<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Survey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->increments('survey_id');
            $table->integer('date');
            $table->integer('months');
            $table->integer('year');
            $table->string('purpose_work');
            $table->string('visitor_name');
            $table->string('visitor_company');
            $table->string('visitor_id');
            $table->string('visitor_department');
            $table->string('visitor_phone');
            $table->string('validity');
            $table->integer('time_in');
            $table->integer('time_out');
            $table->string('lokasi');
            $table->string('akses');
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
        Schema::dropIfExists('survey');
    }
}
