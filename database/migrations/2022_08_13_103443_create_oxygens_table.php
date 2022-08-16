<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOxygensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxygens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('pool_id');
            $table->string('oxygen_val');
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
        Schema::dropIfExists('oxygens');
    }
}
