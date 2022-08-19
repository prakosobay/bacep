<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->foreignId('updated_by');
            $table->string('name')->unique();
            $table->text('address');
            $table->string('phone')->unique();
            $table->string('website');
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
        Schema::dropIfExists('m_companies');
    }
}
