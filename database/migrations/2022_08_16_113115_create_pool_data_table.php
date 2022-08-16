<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pool_id');
            $table->string('temper_val');
            $table->string('ph_val');
            $table->string('humidity_val');
            $table->string('oxygen_val');
            $table->string('tds_val');
            $table->string('turbidities_val');
            $table->timestamps();
            $table->foreign('pool_id')->references('id')->on('pools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool_data');
    }
};
