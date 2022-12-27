<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEksternalVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksternal_visitors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eksternal_id');
            $table->string('name');
            $table->string('phone');
            $table->string('nik');
            $table->string('department');
            $table->string('company');
            $table->string('respon');
            $table->time('checkin')->nullable();
            $table->string('photo_checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->string('photo_checkout')->nullable();
            $table->boolean('is_done')->default(false);
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
        Schema::dropIfExists('eksternal_visitors');
    }
}
