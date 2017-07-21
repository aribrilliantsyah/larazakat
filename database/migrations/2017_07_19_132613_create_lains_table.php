<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orang_id')->unsigned();
            $table->string('jenis');
            $table->integer('nominal');
            $table->timestamps();
            $table->foreign('orang_id')->references('id')->on('orangs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lains');
    }
}
