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
<<<<<<<< HEAD:database/migrations/2022_07_17_084947_create_survey_fulls_table.php
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('request');
========
            $table->date('visit');
            $table->date('leave');
            $table->date('request');
>>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098:database/migrations/2022_07_27_111624_create_survey_fulls_table.php
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
