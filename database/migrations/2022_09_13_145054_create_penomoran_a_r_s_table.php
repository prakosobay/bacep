<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenomoranARSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penomoran_ars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('number');
            $table->unsignedTinyInteger('monthly');
            $table->unsignedSmallInteger('yearly');
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
        Schema::dropIfExists('penomoran_ars');
    }
}
