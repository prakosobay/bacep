<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGensetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gensets', function (Blueprint $table) {
            $table->id();
            $table->boolean('1');
            $table->boolean('2');
            $table->boolean('3');
            $table->boolean('4');
            $table->boolean('5');
            $table->boolean('6');
            $table->boolean('7');
            $table->boolean('8');
            $table->boolean('9');
            $table->boolean('10');
            $table->boolean('11');
            $table->string('remark1');
            $table->string('remark2');
            $table->string('remark3');
            $table->string('remark4');
            $table->string('remark5');
            $table->string('remark6');
            $table->string('remark7');
            $table->string('remark8');
            $table->string('remark9');
            $table->string('remark10');
            $table->string('remark11');
            $table->boolean('1a');
            $table->boolean('2a');
            $table->boolean('3a');
            $table->boolean('4a');
            $table->boolean('5a');
            $table->boolean('6a');
            $table->boolean('7a');
            $table->boolean('8a');
            $table->boolean('9a');
            $table->boolean('10a');
            $table->boolean('11a');
            $table->string('remark1a');
            $table->string('remark2a');
            $table->string('remark3a');
            $table->string('remark4a');
            $table->string('remark5a');
            $table->string('remark6a');
            $table->string('remark7a');
            $table->string('remark8a');
            $table->string('remark9a');
            $table->string('remark10a');
            $table->string('remark11a');
            $table->string('date1');
            $table->string('time1');
            $table->string('date2');
            $table->string('time2');
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
        Schema::dropIfExists('gensets');
    }
}
