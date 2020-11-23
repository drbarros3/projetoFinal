<?php

namespace App\Http\Controllers;

use App\User;
use App\Patente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;

class PolicialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->setorAtuacao == 'SPO' || auth()->user()->chefedoSetor == "SPO" || Auth::user()->patente == 'Coronel' || Auth::user()->patente == 'Major' || Auth::user()->patente == 'Capitão'){
            $policial = User::all()->sortByDesc('id');
            return view('policial/lista_policiais', compact('policial'));
        }else{
            return view('erro');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->setorAtuacao == 'SPO' || auth()->user()->chefedoSetor == "SPO" || Auth::user()->patente == 'Coronel' || Auth::user()->patente == 'Major' || Auth::user()->patente == 'Capitão'){
            $patente = new Patente();
            return view('policial/policial_cadastrar', compact('patente'));
        }else{
            return view('erro');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                'status'            => 'Ok',
                'password'          => bcrypt($request->senha),
            ]);
        
            DB::table('logs')->insert([
                'matricula'     =>  Auth::User()->matricula,
                'acao'          =>  'Cadastrou policial',
                'id_acao'       =>  $request->matricula,
                'data'          =>  now(),
            ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function show(User $policial)
    {
        if(Auth::user()->setorAtuacao == 'SPO' || auth()->user()->chefedoSetor == "SPO" || Auth::user()->patente == 'Coronel' || Auth::user()->patente == 'Major' || Auth::user()->patente == 'Capitão'){
            return view('policial/registroPolicial', compact('policial'));
        }else{
            return view('erro');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function edit(User $policial)
    {
        if(Auth::user()->setorAtuacao == 'SPO' || auth()->user()->chefedoSetor == "SPO" || Auth::user()->patente == 'Coronel' || Auth::user()->patente == 'Major' || Auth::user()->patente == 'Capitão' || Auth::user()->matricula == $policial->matricula){
            return view('policial/policialeditar', compact('policial'));
        }else{
            return view('erro');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $policial)
    {
        $validacao = $this->Validator($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->witherrors($validacao->errors())
                ->withInput($request->all());
        } else {
            if ($request->setorChefe == null) {

                $policial->nome = $request->input("nome");
                $policial->patente = $request->input('patente');
                $path = $request->file("foto")->store('imagens', 'public');
                $policial->foto = $path;
                $policial->sexo = $request->input('sexo');
                $policial->cidade = $request->input("cidade");
                $policial->dataNascimento = $request->input('dataNascimento');
                $policial->estado = $request->input("estado");
                $policial->pelotao = $request->input("pelotao");
                $policial->rg = $request->input("rg");
                $policial->chefe = $request->input('rad');
                $policial->setorAtuacao = $request->input('setor');
                $policial->chefedoSetor = '';
                $policial->chefedaGuarnicao = '';
                $policial->cpf = $request->input("cpf");
                $policial->password = bcrypt($request->input("senha"));
                $policial->status = 'Ok';
                $policial->save();

                DB::table('logs')->insert([
                    'matricula'     =>  Auth::User()->matricula,
                    'acao'          =>  'Atualizou cadastro policial',
                    'id_acao'       =>  $policial->matricula,
                    'data'          =>  now(),
                ]);

                return redirect()->route('home');
            } else {

                $policial->nome = $request->input("nome");
                $policial->patente = $request->input('patente');
                $path = $request->file("foto")->store('imagens', 'public');
                $policial->foto = $path;
                $policial->sexo = $request->input('sexo');
                $policial->cidade = $request->input("cidade");
                $policial->dataNascimento = $request->input('dataNascimento');
                $policial->estado = $request->input("estado");
                $policial->pelotao = $request->input("pelotao");
                $policial->rg = $request->input("rg");
                $policial->chefe = $request->input('rad');
                $policial->setorAtuacao = $request->input('setor');
                $policial->chefedoSetor = $request->input('setorChefe');
                $policial->chefedaGuarnicao = $request->input('Chefeguarnicao');
                $policial->cpf = $request->input("cpf");
                $policial->password = bcrypt($request->input("senha"));
                $policial->status = 'Ok';
                $policial->save();

                DB::table('logs')->insert([
                    'matricula'     =>  Auth::User()->matricula,
                    'acao'          =>  'Atualizou cadastro policial',
                    'id_acao'       =>  $policial->matricula,
                    'data'          =>  now(),
                ]);

                return redirect()->route('home');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $policial)
    {
        $policial->delete();

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Deletou cadastro policial',
            'id_acao'       =>  $policial->matricula,
            'data'          =>  now(),
        ]);

        return redirect()->route('home');
    }

    public function list()
    {
        $policial = User::all();

        return response()->json($policial);
    }

    public function confirmarRegistro($id)
    {
        DB::table('users')->where('id', $id)->update([
            'status' => 'Ok'
        ]);

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Confirmou cadastro policial',
            'id_acao'       =>  $id,
            'data'          =>  now(),
        ]);

        return redirect()->route('policial.index');
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
            'rad'               => 'required',
            'senhaConfirma'     => 'required | same:senha',
        ];

        $mensagens = [
            'required'                  => 'Campo Obrigatório',
            'matricula.unique'          => 'Matrícula já existe',
            'matricula.min'             => 'Campo deve ter no minimo 10 caracter',
            'rg.min'                    => 'Campo deve ter no minimo 10 caracter',
            'cpf.min'                   => 'Campo deve ter no minimo 11 caracter',
            'senha.min'                 => 'Campo deve ter no minimo 6 caracter',
            'same'                      => 'Senhas não coincidem '
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
