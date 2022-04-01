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
            $table->id();
            $table->foreignId('survey_id');
            $table->integer('created_by');
            $table->string('role_to', 50);
            $table->string('status', 50);
            $table->boolean('aktif', 1);
            $table->boolean('pdf', 1);
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
        Schema::dropIfExists('survey_histories');
    }
}
