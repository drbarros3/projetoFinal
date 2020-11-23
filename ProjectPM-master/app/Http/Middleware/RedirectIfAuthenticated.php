<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $validacao = $this->Validator($request->all());
            if($validacao->fails())
            {
                return redirect()->back()
                ->witherrors($validacao->errors())
                ->withInput($request->all());
            }
        }

        return $next($request);
    }

    public function Validator($data)
    {
        $regras=[
            'nome'              => 'required',
            'matricula'         => 'required | unique:Users,',
            'foto'              => 'required',
            'patente'           => 'required',
            'dataNascimento'    => 'required',
            'sexo'              => 'required',
            'cidade'            => 'required',
            'estado'            => 'required',
            'pelotao'           => 'required',
            'rg'                => 'required',
            'cpf'               => 'required',
            'senha'             => 'required',
            'senhaConfirma'     => 'required | same:senha',];

        $mensagens=[
            'nome.required'              => 'Campo Nome é obrigatório.',
            'matricula.required'         => 'Campo Matrícula é obrigatório.',
            'foto.required'              => 'Campo Foto é obrigatório.',
            'patente.required'           => 'Campo Patente é obrigatório.',
            'dataNascimento.required'    => 'Campo Data de Nascimento é obrigatório.',
            'sexo.required'              => 'Campo Sexo é obrigatório.',
            'cidade.required'            => 'Campo Cidade é obrigatório.',
            'estado.required'            => 'Campo Estado é obrigatório.',
            'pelotao.required'           => 'Campo Unidade é obrigatório.',
            'rg.required'                => 'Campo RG é obrigatório.',
            'cpf.required'               => 'Campo CPF é obrigatório.',
            'senha.required'             => 'Campo Senha é obrigatório.',
            'senhaConfirma.required'     => 'Campo Comfirmar Senha é obrigatório.',
            'same'                       => 'As senhas digitadas não coincidem .',
            'matricula.unique'           => 'Matrícula já existe'   
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
