<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningFullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_fulls', function (Blueprint $table) {
            $table->increments('cleaning_full_id');
            $table->integer('cleaning_id');
            $table->string('cleaning_name_1');
            $table->string('cleaning_name_2');
            $table->string('cleaning_work');
            $table->string('status');
            $table->string('link');
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
        Schema::dropIfExists('cleaning_fulls');
    }
}
