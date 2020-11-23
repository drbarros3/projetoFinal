<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula')->unique();
            $table->string('chefe');
            $table->string('chefedoSetor');
            $table->string('chefedaGuarnicao');
            $table->string('setorAtuacao');
            $table->string('nome');
            $table->string('foto');
            $table->string('patente');
            $table->string('dataNascimento');
            $table->string('sexo');
            $table->string('cidade');
            $table->string('estado');
            $table->string('pelotao');
            $table->string('rg');
            $table->string('cpf');
            $table->string('password');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
