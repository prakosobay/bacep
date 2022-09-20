<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_id');
            $table->foreignId('created_by');
            $table->string('role_to');
            $table->string('status');
            $table->boolean('aktif', false);
            $table->boolean('pdf', false);
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
        Schema::dropIfExists('internal_histories');
    }
}