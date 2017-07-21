<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitrahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitrahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orang_id')->unsigned();
            $table->string('jenis_zakat');
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
        Schema::dropIfExists('fitrahs');
    }
}
