<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colo_visitors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colo_id')->constrained('colos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('m_visitor_id')->constrained('visitors')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('done')->nullable();
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->string('photo_checkin')->nullable();
            $table->string('photo_checkout')->nullable();
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
        Schema::dropIfExists('colo_visitors');
    }
}
