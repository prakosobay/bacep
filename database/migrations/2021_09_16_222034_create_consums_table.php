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
            $table->id('consum_id');
            $table->string('nama_barang')->unique();
            $table->unsignedBigInteger('jumlah');
            $table->string('satuan', 50);
            $table->string('kondisi', 100)->nullable();
            $table->text('notes', 500);
            $table->string('lokasi', 100);
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
