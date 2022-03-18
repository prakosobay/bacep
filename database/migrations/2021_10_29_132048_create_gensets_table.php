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
        Schema::create('genset', function (Blueprint $table) {
            $table->id();
            $table->boolean('input1');
            $table->boolean('input2');
            $table->boolean('input3');
            $table->boolean('input4');
            $table->boolean('input5');
            $table->boolean('input6');
            $table->boolean('input7');
            $table->boolean('input8');
            $table->boolean('input9');
            $table->boolean('input10');
            $table->boolean('input11');
            $table->boolean('input12');
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
            $table->string('remark12');
            $table->boolean('input1a');
            $table->boolean('input2a');
            $table->boolean('input3a');
            $table->boolean('input4a');
            $table->boolean('input5a');
            $table->boolean('input6a');
            $table->boolean('input7a');
            $table->boolean('input8a');
            $table->boolean('input9a');
            $table->boolean('input10a');
            $table->boolean('input11a');
            $table->boolean('input12a');
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
            $table->string('remark12a');
            $table->string('date1');
            $table->string('time1');
            $table->string('date2');
            $table->string('time2');
            $table->string('penginput');
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
        Schema::dropIfExists('genset');
    }
}
