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
            $table->string('company');
            $table->string('department');
            $table->integer('phone');
            $table->string('numberId');
            $table->string('respon');
            $table->date('checkin');
            $table->string('Photo_checkin');
            $table->date('checkout');
            $table->string('photo_checkout');
            $table->time('checkin')->nullable();
            $table->string('photo_checkin')->nullable();
            $table->time('checkout')->nullable();
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
