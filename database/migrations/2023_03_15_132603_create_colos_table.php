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
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('background')->nullable();
            $table->string('desc')->nullable();
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
            $table->boolean('is_survey')->nullable();
            $table->foreignId('requestor_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('m_card_id')->nullable()->constrained('m_cards')->onUpdate('cascade')->onDelete('cascade');
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
