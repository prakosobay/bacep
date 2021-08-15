<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterObsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_obs', function (Blueprint $table) {
            $table->bigIncrements('ob_id')->unique();
            $table->string('nama', 100);
            $table->string('id_number', 20);
            $table->string('phone_number', 20);
            $table->string('pt', 100);
            $table->string('responsible', 10);
            $table->string('department', 50);
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
        Schema::dropIfExists('master_obs');
    }
}
