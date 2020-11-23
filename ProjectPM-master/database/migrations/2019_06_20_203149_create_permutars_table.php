<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermutarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permutars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('matricula');
            $table->string('setorAtuacao');
            $table->string('local');
            $table->string('dia_do_servico');
            $table->string('hora_inicial');
            $table->string('hora_final');
            $table->string('escalado');
            $table->string('escaladoMatricula');
            $table->string('escaladoLocal');
            $table->string('escaladoDia_do_servico');
            $table->string('escaladoHora_inicial');
            $table->string('escaladoHora_final');
            $table->string('dataSPO');
            $table->string('assinaturaSPO');
            $table->string('optCMD');
            $table->string('assinaturaCMD');
            $table->string('virtude');
            $table->string('status');
            $table->string('dataConfirmacao');
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
        Schema::dropIfExists('permutars');
    }
}
