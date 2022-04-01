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
            $table->longText('name')->nullable();
            $table->longText('nik')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('company')->nullable();
            $table->longText('dept')->nullable();
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
        Schema::dropIfExists('survey_visitors');
    }
}
