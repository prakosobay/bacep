<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessRequestEksternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_request_eksternals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eksternal_id');
            $table->foreignId('vendor_id');
            $table->unsignedInteger('number');
            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
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
        Schema::dropIfExists('access_request_eksternals');
    }
}