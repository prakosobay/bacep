<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->string('work');
            $table->date('visit');
            $table->date('leave');
            $table->string('background', 500);
            $table->string('describ', 500);
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
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
            $table->string('lain')->nullable();
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
        Schema::dropIfExists('others');
    }
}
