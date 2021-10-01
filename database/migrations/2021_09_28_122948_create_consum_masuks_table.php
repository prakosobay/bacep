<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consum_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consum_id');
            $table->string('nama_barang');
            $table->string('tanggal');
            $table->unsignedInteger('jumlah');
            $table->text('ket')->nullable();
            $table->string('pencatat', 50);
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
        Schema::dropIfExists('consum_masuks');
    }
}
