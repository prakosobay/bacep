<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFullTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_full', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id');
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('request');
            $table->string('link');
            $table->string('note');
            $table->string('status');
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
        Schema::dropIfExists('survey_full');
    }
}
