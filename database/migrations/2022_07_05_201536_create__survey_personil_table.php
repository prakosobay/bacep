<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyPersonilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_survey_personil', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id');
            $table->string('name');
            $table->string('company');
            $table->string('department');
            $table->string('phone');
            $table->string('numberId');
            $table->string('respon');
            $table->time('checkin');
            $table->string('photo_checkin');
            $table->string('photo_checkout');
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
        Schema::dropIfExists('_survey_personil');
    }
}
