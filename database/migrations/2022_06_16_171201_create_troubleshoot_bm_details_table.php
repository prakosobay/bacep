<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroubleshootBmDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troubleshoot_bm_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('troubleshoot_bm_id');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('activity');
            $table->string('service_impact');
            $table->string('item');
            $table->string('procedure');
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
        Schema::dropIfExists('troubleshoot_bm_details');
    }
}
