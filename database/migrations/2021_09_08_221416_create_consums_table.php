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
            $table->string('nama_barang');
            $table->integer('quantity');
            $table->string('satuan');
            $table->string('kondisi');
            $table->text('note');
            $table->string('lokasi');
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
