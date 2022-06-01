<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('other_id');
            $table->string('created_by');
            $table->string('status');
            $table->string('role_to');
            $table->boolean('aktif');
            $table->boolean('pdf');
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
        Schema::dropIfExists('other_histories');
    }
}
