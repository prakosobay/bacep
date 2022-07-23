<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_risks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internal_id');
            $table->string('req_dept');
            $table->string('risk');
            $table->string('poss');
            $table->string('impact');
            $table->string('mitigation');
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
        Schema::dropIfExists('internal_risks');
    }
}
