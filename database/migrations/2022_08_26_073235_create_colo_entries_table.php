<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colo_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colo_id');
            $table->boolean('dc', false)->nullable();
            $table->boolean('mmr1', false)->nullable();
            $table->boolean('mmr2', false)->nullable();
            $table->boolean('cctv', false)->nullable();
            $table->string('lain')->nullable();
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
        Schema::dropIfExists('colo_entries');
    }
}
