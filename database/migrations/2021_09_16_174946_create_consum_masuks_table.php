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
            $table->foreignId('stock_barang_id');
            $table->string('masuk')->nullable();
            $table->unsignedBigInteger('jumlah');
            $table->string('ket');
            $table->string('pencatat');
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
