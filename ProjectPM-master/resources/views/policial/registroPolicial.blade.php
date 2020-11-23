@extends('inicial')

@section('body')
    <div class="registropolicial">
        <div class="registropolicia">
            <p style="font-weight: bold;" class="registron">NOME:<br><p class="registronome">{{$policial->nome}}</p></p>
            <p style="font-weight: bold;" class="registrof"><br> <a href="/storage/{{$policial->foto}}"><img style="width: 100px; height: 100px;" src="/storage/{{$policial->foto}}"/></a></p>
            <p style="font-weight: bold;" class="registrom">  DATA DE NASCIMENTO:<br><p class="registromatricula">{{ date('d/m/Y', strtotime($policial->dataNascimento))}}</p></p>
            <p style="font-weight: bold;" class="registropa">PATENTE:<br><p class="registropatente">{{$policial->patente}}</p></p>
            <p style="font-weight: bold;" class="registrom">MATRÍCULA:<br><p class="registromatricula">{{$policial->matricula}}</p></p>
            <P style="font-weight: bold;" class="registros">SEXO:<br><p class="registrosexo">{{$policial->sexo}}</p></P>
            <P style="font-weight: bold;" class="registrocp">CPF:<br><p class="registrocpf">{{$policial->cpf}}</p></P>
            <P style="font-weight: bold;" class="registror">RG:<br><p class="registrorg">{{$policial->rg}}</p></P>
            <p style="font-weight: bold;" class="registroe">ESTADO:<br><p class="registroestado">{{$policial->estado}}</p></p>
            <P style="font-weight: bold;" class="registroc">CIDADE:<br><p class="registrocidade">{{$policial->cidade}}</p></P>
            <P style="font-weight: bold;" class="registrocp">SETOR DE ATUAÇÃO:<br><p class="registrocpf">{{$policial->setorAtuacao}}</p></P>
            <P style="font-weight: bold;" class="registror">CHEFE DO SETOR:<br><p class="registrorg">{{$policial->chefedoSetor}}</p></P>
            <P style="font-weight: bold;" class="registrou">UNIDADE:<br><p class="registrounidade">{{$policial->pelotao}}</p></P>
    
        </div>
        <form action="{{route('policial.destroy', $policial)}}" method="POST">
            @csrf
            
            @method('DELETE')
            <a onclick="confirma()"  style=" position: relative; left: 58%; width:100px; margin:20px; " class = "btn btn-danger">Excluir</a>
            
            <div id="popupcx">
                <div id="popupimg" >
                    <img src="/imgs/PMBA.png" width="50" height="50" alt="">
                </div>
                <p id="popuptxt">Deseja realmente prosseguir com a ação ?</p>
                <p>
                <input type="submit" id="popupbtnsim"  value="SIM" class="btn btn-success" ><input type="button" onclick="nao()"  id="popupbtnnao" value="NÃO" class="btn btn-danger">
                </p>
            </div>
        </form>    
    </div>
@endsection('body')