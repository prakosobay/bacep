<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_visitors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id');
            $table->string('name');
            $table->string('phone');
            $table->string('nik');
            $table->string('company');
            $table->string('department');
            $table->string('respon')->nullable();
            $table->date('checkin')->nullable();
            $table->string('photo_checkin')->nullable();
            $table->date('checkout')->nullable();
            $table->string('photo_checkout')->nullable();
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
        Schema::dropIfExists('survey_visitors');
    }
}
