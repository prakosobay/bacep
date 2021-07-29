<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationToPilihanWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pilihan_works', function (Blueprint $table) {
            $table->string('loc1')->nullable()->after('work');
            $table->string('loc2')->nullable()->after('loc1');
            $table->string('loc3')->nullable()->after('loc2');
            $table->string('loc4')->nullable()->after('loc3');
            $table->string('loc5')->nullable()->after('loc4');
            $table->string('loc6')->nullable()->after('loc5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pilihan_works', function (Blueprint $table) {
            //
        });
    }
}
