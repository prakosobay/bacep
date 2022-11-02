<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEksternalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksternal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eksternal_id');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('activity');
            $table->string('item');
            $table->string('service_impact');
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
        Schema::dropIfExists('eksternal_details');
    }
}
