<?php

namespace App\Http\Controllers;

use App\Crime;
use App\Suspeito;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JsonIncrementalParser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crime = Crime::all();
        $suspeito = Suspeito::all();
        foreach ($suspeito as $suspeito);
        return view('crime/lista_crime', compact('crime', 'suspeito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = $this->validator($request->all());

        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }


        $suspeito = Suspeito::all();
        $crime = new Crime();
        $crime->id_suspeito     = $request->input('id');
        $crime->suspeito        = $request->input('susp');
        $crime->comparsa        = $request->input('comparsa');
        $crime->crime           = $request->input('crime');
        $crime->data            = $request->input('data');
        $crime->conduzido_por   = $request->input("condutor");
        $crime->save();

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Registrou crime',
            'id_acao'       =>  $crime->id,
            'data'          =>  now(),
        ]);

        foreach ($suspeito as $sus) {
            if ($sus->id == $crime->id_suspeito) {
                DB::table('suspeitos')->where('id', $crime->id_suspeito)->update([
                    'quantidadeCrime' => $sus->quantidadeCrime + 1
                ]);
                return redirect()->route('home');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Suspeito $crime)
    {
        return view('crime/tela_crime', compact('crime'));
    }


    public function registrar($id)
    {
        $crimes = Crime::all();
        foreach ($crimes as $crime) {
            if ($crime->id_suspeito == $id) {
                return view('crime/registrarCrime', compact('crime', 'id'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        if(Auth::User()->setorAtuacao == 'SOINT' || Auth::User()->chefedoSetor == 'SOINT'  || Auth::User()->patente == 'Coronel'){

            return view('crime/editarCrime', compact('crime'));
        }else{
            return view('erro');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        $validacao = $this->ValidatorUpdate($request->all());

        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }

        $id_suspeito = $crime->id_suspeito;

        $crime->comparsa        = $request->input('comparsa');
        $crime->crime           = $request->input('crime');
        $crime->data            = $request->input('data');
        $crime->conduzido_por   = $request->input("condutor");
        $crime->save();

        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  'Atualizou crime',
            'id_acao'       =>  $crime->id,
            'data'          =>  now(),
        ]);
        
        return redirect()->route('crimes', compact('id_suspeito'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crime $crime)
    {
        $crime->delete();

        $quantidadeCrime = DB::select(DB::raw("
            select quantidadeCrime as qtd from suspeitos 
            where id = $crime->id_suspeito
        "));

        DB::table('suspeitos')->update([
            'quantidadeCrime'   =>   $quantidadeCrime[0]->qtd - 1
        ]);
        
        DB::table('logs')->insert([
            'matricula'     =>  Auth::User()->matricula,
            'acao'          =>  "Deletou crime: $crime->crime, suspeito: $crime->suspeito, comparsa: $crime->comparsa, data da condução: $crime->data",
            'id_acao'       =>  $crime->id,
            'data'          =>  now(),
        ]);

        return redirect()->route('suspeitos.index', compact('crime'));
    }

    public function Validator($date)
    {
        $regras = [
            'susp'               => 'required',
            'crime'              => 'required',
            'comparsa'           => 'required',
            'condutor'           => 'required',
        ];

        $mensagens = ['required'   => 'Campo Obrigatório'];

        return Validator::make($date, $regras, $mensagens);
    }

    public function ValidatorUpdate($date)
    {
        $regras = [
            'crime'              => 'required',
            'comparsa'           => 'required',
            'condutor'           => 'required',
        ];

        $mensagens = ['required'   => 'Campo Obrigatório'];

        return Validator::make($date, $regras, $mensagens);
    }
}
