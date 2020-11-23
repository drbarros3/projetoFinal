<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSuspeito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspeitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('vulgo');
            $table->string('cpf');
            $table->string('rg');
            $table->string('sexo');
            $table->string('estado');
            $table->string('cidade');
            $table->string('endereco');
            $table->integer('quantidadeCrime');
            $table->string('localAtuacao');
            $table->string('dataNascimento');
            $table->string('foto');
            $table->string('nomePai');
            $table->string('nomeMae');
            $table->string('obs');
            $table->string('status');
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
        //
    }
}
