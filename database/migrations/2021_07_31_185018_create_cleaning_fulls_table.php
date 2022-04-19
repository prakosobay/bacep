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
            $table->id('cleaning_full_id');
            $table->foreignId('cleaning_id');
            $table->date('cleaning_date');
            $table->date('validity_from');
            $table->date('leave')->nullable();
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->string('cleaning_name', 100);
            $table->string('cleaning_name2', 100);
            $table->string('cleaning_work');
            $table->string('gambar')->nullable();
            $table->string('link');
            $table->string('status');
            $table->softDeletes();
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
