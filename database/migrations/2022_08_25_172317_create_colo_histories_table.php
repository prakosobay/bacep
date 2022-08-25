<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colo_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colo_id');
            $table->foreignId('created_by');
            $table->string('role_to');
            $table->string('status');
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
        Schema::dropIfExists('colo_histories');
    }
}
