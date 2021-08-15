<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_histories', function (Blueprint $table) {
            $table->bigIncrements('cleaning_history_id');
            $table->foreignId('cleaning_id');
            $table->integer('created_by');
            $table->string('role_to', 50);
            $table->string('status', 50);
            $table->boolean('aktif', 1);
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
        Schema::dropIfExists('cleaning_histories');
    }
}
