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
<<<<<<<< HEAD:database/migrations/2022_07_17_084911_create_survey_personils_table.php
            $table->string('respon');
            $table->date('checkin');
            $table->string('Photo_checkin');
            $table->date('checkout');
            $table->string('photo_checkout');
========
            $table->time('checkin')->nullable();
            $table->string('photo_checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->string('photo_checkout')->nullable();
>>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098:database/migrations/2022_07_27_111855_create_survey_visitors_table.php
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
