<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consums', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_barang')->unique();
            $table->string('nama_barang')->unique();
            $table->bigInteger('jumlah')->nullable();
            $table->string('satuan', 30);
            $table->string('kondisi')->nullable();
            $table->longText('note')->nullable();
            $table->string('lokasi')->nullable();
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
        Schema::dropIfExists('consums');
    }
}
