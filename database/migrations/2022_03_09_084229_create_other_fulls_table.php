<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherFullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_fulls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('other_id');
            $table->string('other_date', 25);
            $table->string('other_name', 50);
            $table->string('other_name2', 50);
            $table->string('other_work', 100);
            $table->string('val_from', 100);
            $table->string('status', 50);
            $table->string('link');
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
        Schema::dropIfExists('other_fulls');
    }
}
