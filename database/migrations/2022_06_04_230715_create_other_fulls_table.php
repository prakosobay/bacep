<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherFullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_fulls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('other_id');
            $table->string('work');
            $table->date('request');
            $table->date('visit');
            $table->date('leave');
            $table->string('link');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('other_fulls');
    }
}
