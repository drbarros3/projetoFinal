<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suspeito extends Model
{
    protected $fillabe = [
        'id', 'nome', 'vulgo', 'cpf', 'rg', 'sexo', 'estado', 'cidade', 'endereco', 'quntidadedeCrime',
        'localAtuacao', 'dataNascimento', 'foto', 'nomePai', 'nomeMae', 'obs' 
    ];
    
    protected $table = 'Suspeitos';

}
