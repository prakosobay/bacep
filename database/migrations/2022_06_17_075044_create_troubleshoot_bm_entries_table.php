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
            $table->enum('server', ['1', '0'])->nullable();
            $table->enum('mmr1', ['1', '0'])->nullable();
            $table->enum('mmr2', ['1', '0'])->nullable();
            $table->enum('ups', ['1', '0'])->nullable();
            $table->enum('fss', ['1', '0'])->nullable();
            $table->enum('cctv', ['1', '0'])->nullable();
            $table->enum('trafo', ['1', '0'])->nullable();
            $table->enum('baterai', ['1', '0'])->nullable();
            $table->enum('panel', ['1', '0'])->nullable();
            $table->enum('generator', ['1', '0'])->nullable();
            $table->enum('yard', ['1', '0'])->nullable();
            $table->enum('parking', ['1', '0'])->nullable();
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
