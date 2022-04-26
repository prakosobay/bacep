<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_cleanings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cleaning_id');
            $table->date('visit_date');
            $table->time('checkin');
            $table->time('checkout');
            $table->string('pic1');
            $table->string('pic2');
            $table->boolean('trafo_pintu');
            $table->boolean('trafo_lantai');
            $table->boolean('panel_dinding');
            $table->boolean('panel_body');
            $table->boolean('panel_pintu');
            $table->boolean('panel_lantai');
            $table->boolean('batre_dinding');
            $table->boolean('batre_body');
            $table->boolean('batre_pintu');
            $table->boolean('batre_lantai');
            $table->boolean('genset_body');
            $table->boolean('genset_daily');
            $table->boolean('genset_pintu');
            $table->boolean('genset_lantai');
            $table->boolean('mmr1_dinding');
            $table->boolean('mmr1_underaised');
            $table->boolean('mmr1_pintu');
            $table->boolean('mmr1_plafon');
            $table->boolean('mmr1_raised');
            $table->boolean('mmr2_dinding');
            $table->boolean('mmr2_underaised');
            $table->boolean('mmr2_pintu');
            $table->boolean('mmr2_plafon');
            $table->boolean('mmr2_raised');
            $table->boolean('cctv_plafon');
            $table->boolean('cctv_rack');
            $table->boolean('cctv_dinding');
            $table->boolean('cctv_pintu');
            $table->boolean('cctv_underaised');
            $table->boolean('cctv_raise');
            $table->boolean('fss_pintu');
            $table->boolean('fss_dinding');
            $table->boolean('fss_plafon');
            $table->boolean('fss_raised');
            $table->boolean('fss_underaised');
            $table->boolean('fss_tabung');
            $table->boolean('ups_pintu');
            $table->boolean('ups_dinding');
            $table->boolean('ups_raised');
            $table->boolean('ups_underaised');
            $table->boolean('ups_plafon');
            $table->boolean('dc_dinding');
            $table->boolean('dc_raised');
            $table->boolean('dc_body');
            $table->boolean('dc_rack');
            $table->boolean('dc_plafon');
            $table->boolean('dc_underaised');
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
        Schema::dropIfExists('checklist_cleanings');
    }
}
