<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroubleshootBmHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troubleshoot_bm_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('troubleshoot_bm_id');
            $table->string('created_by');
            $table->string('role_to');
            $table->string('status');
            $table->boolean('aktif', false);
            $table->boolean('pdf', false);
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
        Schema::dropIfExists('troubleshoot_bm_histories');
    }
}
