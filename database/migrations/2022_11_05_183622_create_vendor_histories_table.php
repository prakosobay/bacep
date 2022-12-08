<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id');
            $table->foreignId('created_by');
            $table->string('status');
            $table->string('role_to');
            $table->boolean('aktif');
            $table->boolean('pdf');
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
        Schema::dropIfExists('vendor_histories');
    }
}
