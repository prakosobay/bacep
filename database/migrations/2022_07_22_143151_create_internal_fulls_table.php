<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalFullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_fulls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_id');
            $table->string('req_dept');
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->date('request');
            $table->string('link');
            $table->string('status');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('internal_fulls');
    }
}
