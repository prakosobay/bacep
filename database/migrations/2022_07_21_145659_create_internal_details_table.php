<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_id');
            $table->string('req_dept');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('activity');
            $table->string('service_impact');
            $table->string('item');
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
        Schema::dropIfExists('internal_details');
    }
}
