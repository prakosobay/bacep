<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_barangs', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama_barang');
            $table->bigInteger('jumlah');
            $table->string('satuan', 50);
            $table->string('kondisi');
            $table->text('notes');
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
        Schema::dropIfExists('stock_barangs');
    }
}
