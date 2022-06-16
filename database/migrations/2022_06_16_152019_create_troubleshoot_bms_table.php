<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroubleshootBmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troubleshoot_bms', function (Blueprint $table) {
            $table->id();
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('background');
            $table->string('desc');
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
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
        Schema::dropIfExists('troubleshoot_bms');
    }
}
