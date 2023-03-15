<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colo_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colo_id')->constrained('colos')->onUpdate('cascade')->onDelete('cascade');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('activity');
            $table->string('item');
            $table->string('service_impact');
            $table->string('procedure');
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
        Schema::dropIfExists('colo_details');
    }
}
