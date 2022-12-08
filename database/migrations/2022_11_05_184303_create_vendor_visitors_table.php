<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_visitors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id');
            $table->string('name');
            $table->string('nik');
            $table->string('phone');
            $table->string('department');
            $table->string('company');
            $table->string('respon');
            $table->time('checkin');
            $table->string('photo_checkin');
            $table->time('checkout');
            $table->string('photo_checkout');
            $table->boolean('is_done');
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
        Schema::dropIfExists('vendor_visitors');
    }
}
