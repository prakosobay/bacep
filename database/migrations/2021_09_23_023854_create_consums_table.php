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
            $table->string('nama_barang')->unique();
            $table->unsignedInteger('itemcode')->nullable();
            $table->unsignedInteger('jumlah')->nullable();
            $table->string('satuan');
            $table->string('kondisi')->nullable();
            $table->string('note')->nullable();
            $table->string('lokasi')->nullable();
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
        Schema::dropIfExists('consums');
    }
}
