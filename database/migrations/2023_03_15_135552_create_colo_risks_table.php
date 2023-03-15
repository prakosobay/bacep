<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colo_risks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colo_id')->constrained('colos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('m_risk_id')->constrained('m_risks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('colo_risks');
    }
}
