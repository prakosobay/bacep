<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('req_name');
            $table->string('req_company');
            $table->string('req_address');
            $table->string('req_email');
            $table->string('req_dept');
            $table->string('req_phone');
            $table->string('item');
            $table->integer('qty');
            $table->enum('rack', ['mm1', 'mmr2', 'dc', 'cctv']);
            $table->integer('rack_from')->nullable();
            $table->enum('to', ['mmr1', 'mmr2', 'dc', 'cctv']);
            $table->integer('rack_to')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('consumables');
    }
}
