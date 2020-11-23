<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('suspeito');
            $table->string('comparsa');
            $table->string('crime');
            $table->string('data');
            $table->string('conduzido_por');
            $table->bigInteger('id_suspeito')->unsigned();
            $table->foreign('id_suspeito')->references('id')->on('suspeitos')->onDelete('cascade');
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
        Schema::dropIfExists('crimes');
    }
}
