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
            $table->increments('survey_full_id');
            $table->integer('survey_id');
            $table->string('visitor_name');
            $table->string('visitor_company');
            $table->string('purpose_work');
            $table->string('status');
            $table->string('link');
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
