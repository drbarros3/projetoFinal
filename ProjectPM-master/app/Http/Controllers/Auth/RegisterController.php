<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $validacao = $this->Validator($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }


        $path = $request->file("foto")->store('imagens', 'public');

        DB::table('users')->insert([
            'nome'              => $request->nome,
            'matricula'         => $request->matricula,
            'foto'              => $path,
            'chefe'             => $request->rad,
            'chefedoSetor'      => $request->setorChefe,
            'chefedaGuarnicao'  => $request->Chefeguarnicao,
            'setorAtuacao'      => $request->setor,
            'patente'           => $request->patente,
            'dataNascimento'    => $request->dataNascimento,
            'sexo'              => $request->sexo,
            'cidade'            => $request->cidade,
            'estado'            => $request->estado,
            'pelotao'           => $request->pelotao,
            'rg'                => $request->rg,
            'cpf'               => $request->cpf,
            'password'          => bcrypt($request->senha),
        ]);


        return redirect()->route('home');
    }

    protected function registrar(Request $request)
    {
        $validacao = $this->Validator($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }


        $path = $request->file("foto")->store('imagens', 'public');

        if ($request->setorChefe == null) {
            DB::table('users')->insert([
                'nome'              => $request->nome,
                'matricula'         => $request->matricula,
                'foto'              => $path,
                'chefe'             => $request->rad,
                'chefedoSetor'      => '',
                'chefedaGuarnicao'  => '',
                'setorAtuacao'      => $request->setor,
                'patente'           => $request->patente,
                'dataNascimento'    => $request->dataNascimento,
                'sexo'              => $request->sexo,
                'cidade'            => $request->cidade,
                'estado'            => $request->estado,
                'pelotao'           => $request->pelotao,
                'rg'                => $request->rg,
                'cpf'               => $request->cpf,
                'status'            => 'Pendente',
                'password'          => bcrypt($request->senha),
            ]);
        } else {
            DB::table('users')->insert([
                'nome'              => $request->nome,
                'matricula'         => $request->matricula,
                'foto'              => $path,
                'chefe'             => $request->rad,
                'chefedoSetor'      => $request->setorChefe,
                'chefedaGuarnicao'  => $request->Chefeguarnicao,
                'setorAtuacao'      => $request->setor,
                'patente'           => $request->patente,
                'dataNascimento'    => $request->dataNascimento,
                'sexo'              => $request->sexo,
                'cidade'            => $request->cidade,
                'estado'            => $request->estado,
                'pelotao'           => $request->pelotao,
                'rg'                => $request->rg,
                'cpf'               => $request->cpf,
                'status'            => 'Pendente',
                'password'          => bcrypt($request->senha),
            ]);
        }

        DB::table('logs')->insert([
            'matricula'     =>  $request->matricula,
            'acao'          =>  'Policial solicitou cadastro',
            'data'          =>  now(),
        ]);
        
        return redirect()->route('/');
    }

    public function Validator($data)
    {
        $regras = [
            'nome'              => 'required',
            'matricula'         => 'required | min:10 | unique:users',
            'foto'              => 'required',
            'patente'           => 'required',
            'dataNascimento'    => 'required',
            'sexo'              => 'required',
            'cidade'            => 'required',
            'estado'            => 'required',
            'pelotao'           => 'required',
            'rg'                => 'required | min:10',
            'cpf'               => 'required | min:11',
            'senha'             => 'required | min:6',
            'senhaConfirma'     => 'required | same:senha',
        ];

        $mensagens = [
            'required'                   => 'Campo Obrigatório',
            'matricula.unique'           => 'Matrícula já existe',
            'matricula.min'              => 'Campo deve ter no minimo 10 caracter',
            'rg.min'                    => 'Campo deve ter no minimo 10 caracter',
            'cpf.min'                   => 'Campo deve ter no minimo 11 caracter',
            'senha.min'                 => 'Campo deve ter no minimo 6 caracter',
            'same'                       => 'Senhas não coincidem '
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
