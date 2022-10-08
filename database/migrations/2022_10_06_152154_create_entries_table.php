<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->boolean('dc')->nullable();
            $table->boolean('mmr1')->nullable();
            $table->boolean('mmr2')->nullable();
            $table->boolean('cctv')->nullable();
            $table->boolean('genset')->nullable();
            $table->boolean('panel')->nullable();
            $table->boolean('baterai')->nullable();
            $table->boolean('trafo')->nullable();
            $table->boolean('office1')->nullable();
            $table->boolean('fss')->nullable();
            $table->boolean('ups')->nullable();
            $table->boolean('yard')->nullable();
            $table->boolean('parking')->nullable();
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
        Schema::dropIfExists('entries');
    }
}
