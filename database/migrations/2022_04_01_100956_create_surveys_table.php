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
            $table->string('name_req', 200);
            $table->string('dept_req', 200);
            $table->string('phone_req', 200);
            $table->json('visit_name');
            $table->json('visit_nik');
            $table->json('visit_company');
            $table->json('visit_dept');
            $table->json('visit_phone');
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
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
