<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroubleshootBmEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troubleshoot_bm_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('troubleshoot_bm_id');
            $table->boolean('dc', false)->nullable();
            $table->boolean('mmr1', false)->nullable();
            $table->boolean('mmr2', false)->nullable();
            $table->boolean('ups', false)->nullable();
            $table->boolean('fss', false)->nullable();
            $table->boolean('cctv', false)->nullable();
            $table->boolean('trafo', false)->nullable();
            $table->boolean('baterai', false)->nullable();
            $table->boolean('panel', false)->nullable();
            $table->boolean('generator', false)->nullable();
            $table->boolean('yard', false)->nullable();
            $table->boolean('parking', false)->nullable();
            $table->string('lain')->nullable();
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
        Schema::dropIfExists('troubleshoot_bm_entries');
    }
}
