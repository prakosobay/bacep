<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeRequestInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_request_internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_id');
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
        Schema::dropIfExists('change_request_internals');
    }
}
