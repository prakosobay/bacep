<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requestor_id');
            $table->foreignId('m_card_id')->nullable();
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->boolean('isColo');
            $table->boolean('isSurvey');
            $table->string('background')->nullable();
            $table->string('desc')->nullable();
            $table->string('rollback')->nullable();
            $table->string('testing')->nullable();
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
        Schema::dropIfExists('internals');
    }
}
