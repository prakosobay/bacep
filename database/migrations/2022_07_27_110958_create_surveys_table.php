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
<<<<<<<< HEAD:database/migrations/2022_07_17_084852_create_surveys_table.php
            $table->string('name_req');
            $table->string('dept_req');
            $table->integer('phone_req');
========
            $table->string('req_name');
            $table->string('req_phone');
            $table->string('req_dept');
            $table->string('req_email');
            $table->string('reject_note')->nullable();
            $table->softDeletes();
>>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098:database/migrations/2022_07_27_110958_create_surveys_table.php
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
