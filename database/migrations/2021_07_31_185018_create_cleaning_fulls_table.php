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
            $table->string('cleaning_work');
            $table->date('validity_from');
            $table->time('time_visit')->nullable();
            $table->date('leave')->nullable();
            $table->time('time_leave')->nullable();
            $table->string('cleaning_name', 100);
            $table->string('cleaning_name2', 100);
            $table->dateTime('checkin')->nullable();
            $table->dateTime('checkout')->nullable();
            $table->string('link');
            $table->string('gambar_pic1')->nullable();
            $table->string('gambar_pic2')->nullable();
            $table->string('gambar_dc')->nullable();
            $table->string('dc_name')->nullable();
            $table->text('note')->nullable();
            $table->date('cleaning_date');
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
