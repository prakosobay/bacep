<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEksternalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksternal_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->foreignId('eksternal_id');
            $table->string('role_to');
            $table->string('status');
            $table->boolean('aktif');
            $table->boolean('pdf');
            $table->string('type');
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
        Schema::dropIfExists('eksternal_histories');
    }
}
