<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_id');
            $table->string('req_dept');
            $table->boolean('dc', false)->nullable();
            $table->boolean('mmr1', false)->nullable();
            $table->boolean('mmr2', false)->nullable();
            $table->boolean('cctv', false)->nullable();
            $table->string('lain', false)->nullable();
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
        Schema::dropIfExists('internal_entries');
    }
}
