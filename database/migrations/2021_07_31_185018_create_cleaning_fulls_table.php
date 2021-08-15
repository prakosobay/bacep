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
            $table->bigIncrements('cleaning_full_id');
            $table->foreignId('cleaning_id');
            $table->string('cleaning_date', 25);
            $table->string('cleaning_name', 50);
            $table->string('cleaning_name2', 50);
            $table->string('cleaning_work', 100);
            $table->string('status', 50);
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
