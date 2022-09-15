<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEksternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksternals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requestor_id');
            $table->foreignId('penomoranar_id');
            $table->foreignId('penomorancr_id');
            $table->foreignId('card_id')->nullable();
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('background');
            $table->string('desc');
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
            $table->string('reject_note')->nullable();
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
        Schema::dropIfExists('eksternals');
    }
}
