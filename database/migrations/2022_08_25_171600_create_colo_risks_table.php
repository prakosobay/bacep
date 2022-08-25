<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colo_risks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colo_id');
            $table->string('risk');
            $table->string('poss');
            $table->string('impact');
            $table->string('mitigation');
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
        Schema::dropIfExists('colo_risks');
    }
}
