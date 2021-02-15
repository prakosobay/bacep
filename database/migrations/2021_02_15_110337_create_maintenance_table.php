<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            Schema::create('maintenance', function (Blueprint $table) {
                $table->increments('maintenance_id');
                $table->integer('date');
                $table->integer('months');
                $table->integer('year');
                $table->string('purpose_work');
                $table->string('visitor_name');
                $table->string('visitor_company');
                $table->string('visitor_id');
                $table->string('visitor_department');
                $table->string('visitor_phone');
                $table->string('validity');
                $table->integer('time_in');
                $table->integer('time_out');
                $table->string('lokasi');
                $table->string('akses');
                $table->string('background_objective');
                $table->string('description_work');
                $table->string('resiko_dampak');
                $table->string('perlatan');
                $table->string('kegiatan');
                $table->string('kabel');
                $table->string('length');
                $table->integer('qty');
                $table->string('area_from');
                $table->string('area_to');
                $table->integer('rack_from');
                $table->integer('rack_to');
                $table->string('jenis_rack');
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance');
    }
}
