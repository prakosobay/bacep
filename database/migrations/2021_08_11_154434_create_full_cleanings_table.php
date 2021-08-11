<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_cleanings', function (Blueprint $table) {
            $table->bigIncrements('full_c_id');
            $table->foreignId('form_c_id');
            $table->string('cleaning_date', 25);
            $table->string('cleaning_name');
            $table->string('cleaning_name2');
            $table->string('cleaning_work');
            $table->string('status', 25);
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
        Schema::dropIfExists('full_cleanings');
    }
}
