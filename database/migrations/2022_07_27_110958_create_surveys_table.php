<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->date('visit');
            $table->date('leave');
            $table->string('name_req');
            $table->string('dept_req');
            $table->integer('phone_req');
            $table->string('req_name');
            $table->string('req_phone');
            $table->string('req_dept');
            $table->string('req_email');
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
        Schema::dropIfExists('surveys');
    }
}
