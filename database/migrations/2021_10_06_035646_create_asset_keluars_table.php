<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->string('nama_barang');
            $table->unsignedInteger('jumlah');
            $table->string('ket')->nullable();
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
        Schema::dropIfExists('asset_keluars');
    }
}
