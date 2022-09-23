<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenomoranCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penomoran_cleanings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cleaning_id');
            $table->foreignId('other_id');
            $table->foreignId('troubleshoot_bm_id');
            $table->unsignedInteger('number_ar');
            $table->unsignedTinyInteger('month_ar');
            $table->unsignedSmallInteger('year_ar');
            $table->unsignedInteger('number_cr');
            $table->unsignedTinyInteger('month_cr');
            $table->unsignedSmallInteger('year_cr');
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
        Schema::dropIfExists('penomoran_cleanings');
    }
}
