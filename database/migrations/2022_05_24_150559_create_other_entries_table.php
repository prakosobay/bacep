<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('other_id');
            $table->boolean('server')->nullable();
            $table->boolean('mmr1')->nullable();
            $table->boolean('mmr2')->nullable();
            $table->boolean('ups')->nullable();
            $table->boolean('fss')->nullable();
            $table->boolean('cctv')->nullable();
            $table->boolean('generator')->nullable();
            $table->boolean('panel')->nullable();
            $table->boolean('baterai')->nullable();
            $table->boolean('trafo')->nullable();
            $table->boolean('yard')->nullable();
            $table->boolean('parking')->nullable();
            $table->string('other')->nullable();
            $table->enum('option', ['maintenance', 'troubleshoot']);
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
        Schema::dropIfExists('other_entries');
    }
}
