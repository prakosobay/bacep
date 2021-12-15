<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personil', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('company');
            $table->string('department');
            $table->string('respon');
            $table->string('phone')->unique();
            $table->string('nik')->unique();
            $table->string('ktp')->nullable();
            $table->string('vaksin_1')->nullable();
            $table->string('vaksin_2')->nullable();
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
        Schema::dropIfExists('personil');
    }
}
