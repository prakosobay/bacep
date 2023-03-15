<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colo_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colo_id')->constrained('colos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('m_room_id')->constrained('m_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('m_rack_id')->constrained('m_racks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('colo_entries');
    }
}
