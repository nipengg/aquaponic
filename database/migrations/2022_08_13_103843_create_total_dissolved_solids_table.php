<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalDissolvedSolidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_dissolved_solids', function (Blueprint $table) {
            $table->unsignedBigInteger('pool_id');
            $table->string('tds_val');
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
        Schema::dropIfExists('total_dissolved_solids');
    }
}
