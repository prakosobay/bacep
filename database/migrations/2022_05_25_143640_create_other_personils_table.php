<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherPersonilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_personils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('other_id');
            $table->string('name');
            $table->string('company');
            $table->string('department');
            $table->string('respon');
            $table->string('phone');
            $table->string('number');
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->string('photo_checkin')->nullable();
            $table->string('photo_checkout')->nullable();
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
        Schema::dropIfExists('other_personils');
    }
}
