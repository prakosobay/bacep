<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_fulls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id');
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('request');
            $table->date('visit');
            $table->date('leave');
            $table->date('request');
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
        Schema::dropIfExists('survey_fulls');
    }
}
