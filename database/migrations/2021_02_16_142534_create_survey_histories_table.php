<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_histories', function (Blueprint $table) {
            $table->increments('survey_history_id');
            $table->integer('survey_id');
            $table->integer('created_by');
            $table->string('role_to');
            $table->string('status');
            $table->boolean('aktif');
            $table->timestamps();
        });

        // Schema::table('survey_histories', function (Blueprint $table) {
        //     $table->foreign('survey_id')->references('survey_id')->on('survey');
        //     $table->foreign('created_by')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_histories');
    }
}