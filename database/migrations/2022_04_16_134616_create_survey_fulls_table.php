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
            $table->date('visit');
            $table->date('leave');
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->string('company');
            $table->string('link');
            $table->softDeletes();
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
