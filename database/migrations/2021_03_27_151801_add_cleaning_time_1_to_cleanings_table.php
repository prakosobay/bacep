<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCleaningTime1ToCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cleanings', function (Blueprint $table) {
            $table->string('cleaning_time_1', 6)->nullable()->after('cleaning_procedure_1');
            $table->string('cleaning_time_2', 6)->nullable()->after('cleaning_procedure_2');
            $table->string('cleaning_time_3', 6)->nullable()->after('cleaning_procedure_3');
            $table->string('cleaning_time_4', 6)->nullable()->after('cleaning_procedure_4');
            $table->string('cleaning_time_5', 6)->nullable()->after('cleaning_procedure_5');
            $table->string('cleaning_time_6', 6)->nullable()->after('cleaning_procedure_6');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cleanings', function (Blueprint $table) {
            //
        });
    }
}
