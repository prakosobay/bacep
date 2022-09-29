<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_visitors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_id');
            $table->string('name');
            $table->string('company');
            $table->string('department');
            $table->string('respon');
            $table->string('nik');
            $table->string('phone');
            $table->time('checkin')->nullable();
            $table->string('photo_checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->string('photo_checkout')->nullable();
            $table->boolean('isDone', false);
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
        Schema::dropIfExists('internal_visitors');
    }
}
