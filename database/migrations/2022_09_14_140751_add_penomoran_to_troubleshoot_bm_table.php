<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenomoranToTroubleshootBmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('troubleshoot_bms', function (Blueprint $table) {
            $table->foreignUuid('penomoranar_id')->nullable()->after('id');
            $table->foreignUuid('penomorancr_id')->nullable()->after('penomoranar_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('troubleshoot_bms', function (Blueprint $table) {
            //
        });
    }
}
