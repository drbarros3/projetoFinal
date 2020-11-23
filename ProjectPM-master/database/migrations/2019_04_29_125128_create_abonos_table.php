<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('num_mat');
            $table->string('setorAtuacao');
            $table->string('substituto');
            $table->string('mat_sub');
            $table->string('servico');
            $table->string('funcao');
            $table->string('data');
            $table->string('das');
            $table->string('as');
            $table->string('status');
            $table->string('dataConfirmacao');
            $table->string('assinaturaCMD');
            $table->string('dataConfirmacaoCMD');
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
        Schema::dropIfExists('abonos');
    }
}
