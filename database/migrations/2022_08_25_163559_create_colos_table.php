<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requestor_id');
            $table->string('rack');
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('background');
            $table->string('desc');
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
            $table->string('reject_note')->nullable();
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
        Schema::dropIfExists('colos');
    }
}
