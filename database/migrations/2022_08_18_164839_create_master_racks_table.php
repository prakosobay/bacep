<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterRacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_racks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('m_room_id');
            $table->foreignId('m_company_id');
            $table->string('number');
            $table->foreignId('created_by');
            $table->foreignId('updated_by');
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
        Schema::dropIfExists('m_racks');
    }
}
