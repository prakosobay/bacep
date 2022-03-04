<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->string('nama_barang');
            $table->unsignedBigInteger('jumlah');
            $table->text('ket')->nullable();
            $table->string('pencatat');
            $table->string('tanggal');
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
        Schema::dropIfExists('asset_masuks');
    }
}
