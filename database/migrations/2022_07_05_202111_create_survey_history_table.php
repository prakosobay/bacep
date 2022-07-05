<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_history', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id');
            $table->string('created_by');
            $table->string('role_to');
            $table->string('status');
            $table->string('aktif');
            $table->string('pdf');
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
        Schema::dropIfExists('survey_history');
    }
}
