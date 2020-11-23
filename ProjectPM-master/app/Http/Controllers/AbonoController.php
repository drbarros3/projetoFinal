<?php

namespace App\Http\Controllers;

use App\Abono;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abonos = Abono::all()->sortByDesc('id');
        return view('abono/lista_abono', compact('abonos'));
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abono/abono_servico');
    }
    public function store(Request $request)
    {
        $validacao = $this->validator($request->all());

        if($validacao->fails()){
            return redirect()->back()
            ->withErrors($validacao->errors())
            ->withInput($request->all());
        }
        $abonos = new Abono();
        $abonos->num_mat = $request->input("mat");
        $abonos->nome = $request->input("nome");
        $abonos->setorAtuacao = auth::user()->setorAtuacao;
        $abonos->substituto = $request->input("substituto");
        $abonos->mat_sub = $request->input("mat_sub");
        $abonos->servico = $request->input("servico");
        $abonos->funcao = $request->input("funcao");
        $abonos->data = $request->input('data');
        $abonos->das = $request->input("horario");
        $abonos->as = $request->input("as");
        $abonos->status = "Aguardando Confirmação";
        $abonos->dataConfirmacao = "";
        $abonos->assinaturaCMD = "";
        $abonos->dataConfirmacaoCMD = "";
        $abonos->save();

        
        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Solicitação de Abono',
            'id_acao'       =>  $abonos->id,
            'data'          =>  now(),
        ]);

        return redirect()->route('abono.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function show(Abono $abono)
    {
        if ($abono->status == "Refazer" && Auth::user()->matricula == $abono->num_mat){
            return redirect()->route('abono.edit', compact('abono'));
        }else if ($abono->status == "Aguardando Confirmação" && Auth::User()->matricula == $abono->mat_sub) {
            return view('abono/abono_substituto', compact('abono'));
        }else if ($abono->status == "Confirmado pelo SPO" && Auth::User()->setor == 'PELOTÃO' && Auth::User()->chefedeSetor == 'Sim') {
            return view('abono/documento_abono', compact('abono'));
        }else if ($abono->status == "Confirmado") {
        return view('abono/documento_abono', compact('abono'));
        }else if ($abono->status != "Confirmado e Finalizado" && Auth::User()->matricula != $abono->mat_sub ) {
            return view('abono/documento_abono', compact('abono'));
        }else if ($abono->status != "Confirmado e Finalizado" && Auth::User()->matricula == $abono->mat_sub) {
            return view('abono/documento_abono', compact('abono'));
        }else if ($abono->status == "Confirmado e Finalizado") {
            return view('abono/documento_abono', compact('abono'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function edit(Abono $abono)
    {
        return view('abono/abono_refazer', compact('abono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abono $abono)
    {
        $validacao = $this->validator($request->all());

        if($validacao->fails()){
            return redirect()->back()
            ->withErrors($validacao->errors())
            ->withInput($request->all());
        }

        DB::table('abonos')->where('id', $abono->id)->update([
            'num_mat'               => $request->input("mat"),
            'nome'                  => $request->input("nome"),
            'setorAtuacao'          => Auth::user()->setorAtuacao,
            'substituto'            => $request->input("substituto"),
            'mat_sub'               => $request->input("mat_sub"),
            'servico'               => $request->input("servico"),
            'funcao'                => $request->input("funcao"),
            'data'                  => $request->input('data'),
            'das'                   => $request->input("horario"),
            'as'                    => $request->input("as"),
            'status'                => "Aguardando Confirmação",
            'dataConfirmacao'       => "",
            'assinaturaCMD'         => "",
            'dataConfirmacaoCMD'    => "",
        ]);

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Refez Abono',
            'id_acao'       =>  $abono->id,
            'data'          =>  now(),
        ]);

        return redirect()->route('abono.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abono $abono)
    {
        //
    }

    public function Validator($date)
    {
        $regras = [
            'mat'               => 'required',
            'nome'              => 'required',
            'mat_sub'           => 'required',
            'substituto'        => 'required',
            'servico'           => 'required',
            'funcao'            => 'required',
            'horario'           => 'required',
            'data'              => 'required',
            'as'                => 'required',
        ];

        $mensagens = ['required'   => 'Campo Obrigatório'];

        return Validator::make($date, $regras, $mensagens);
    }

    public function sub_confirma($id)
    {
        DB::table('abonos')->where('id', $id)->update([
            'status'                =>      'Aguardando confirmação do CMD',
            'dataConfirmacao'       =>      now()
        ]);

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Aceitou pedido de Abono',
            'id_acao'       =>  $id,
            'data'          =>  now(),
        ]);

        return redirect()->route('home');
    }

    public function nao($id)
    {
        DB::table('abonos')->where('id', $id)->update([
            'status'    => 'Nâo Autorizado'
        ]);

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Pedido de Abono recusado',
            'id_acao'       =>  $id,
            'data'          =>  now(),
        ]);

        return redirect()->route('home');
    }

    public function refazer($id)
    {
        DB::table('abonos')->where('id', $id)->update([
            'status'    => 'Refazer'
        ]);
        
        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Refazer pedido de Abono',
            'id_acao'       =>  $id,
            'data'          =>  now(),
        ]);

        return redirect()->route('home');
    }

    public function CMD($id)
    {
        DB::table('abonos')->where('id', $id)->update([
            'status'                => 'Confirmado e Finalizado',
            'dataConfirmacaoCMD'    =>  now(),
            'assinaturaCMD'         => Auth::user()->nome
        ]);

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Pedido de Abono autorizado',
            'id_acao'       =>  $id,
            'data'          =>  now(),
        ]);

        return redirect()->route('home');
    }

    public function imprimir(Abono $abono)
    {
        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Solicitou impressão do Abono',
            'data'          =>  now(),
        ]);

        return view('abono/gerar_pdf_abono', compact('abono'));
    }
}
