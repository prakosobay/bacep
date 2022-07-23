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
            $table->string('req_name');
            $table->string('req_dept');
            $table->string('req_phone');
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('background');
            $table->string('desc');
            $table->string('rollback')->nullable();
            $table->string('testing')->nullable();
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
