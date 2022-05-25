<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherPersonilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_personils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('other_id');
            $table->string('visit_name');
            $table->string('visit_company');
            $table->string('visit_department');
            $table->string('visit_responsibility');
            $table->string('visit_phone');
            $table->string('visit_number');
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
        Schema::dropIfExists('other_personils');
    }
}
