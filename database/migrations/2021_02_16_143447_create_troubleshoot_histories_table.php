<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroubleshootHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troubleshoot_histories', function (Blueprint $table) {
            $table->increments('troubleshoot_history_id');
            $table->integer('troubleshoot_id');
            $table->integer('created_by');
            $table->integer('role_to');
            $table->integer('status');
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
        Schema::dropIfExists('troubleshoot_histories');
    }
}
