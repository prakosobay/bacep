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
            $table->string('name-req', 200);
            $table->string('dept-req', 200);
            $table->string('phone-req', 200);
            $table->json('visit-name');
            $table->json('visit-nik');
            $table->json('visit-company');
            $table->json('visit-dept');
            $table->json('visit-phone');
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
