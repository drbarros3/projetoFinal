@extends('inicial')

@section('body')
    <div  class="registrosuspeito">
        <div class="registrosus"> 
            <h2 style="text-align: center; margin-top: 10px;">Registro do Suspeito</h2>
            <p style="font-weight: bold;" class="registroSn">NOME:<br><p class="registronome">{{$suspeito->nome}}</p></p>
            <p style="font-weight: bold;" class="registroSf"><br> <a href="/storage/{{$suspeito->foto}}"> <img class="img-responsive" id="sizeImage" src="/storage/{{$suspeito->foto}}"/></a></p>
            <p style="font-weight: bold;" class="registroSv">VULGO:<br><p class="registrovulgo">{{$suspeito->vulgo}}</p></p>
            <P style="font-weight: bold;" class="registroSex">SEXO:<br><p class="registroSsexo">{{$suspeito->sexo}}</p></P>
            <P style="font-weight: bold;" class="registroSdata">DATA DE NASCIMENTO:<br><p class="registrodatan">{{date( 'd/m/Y' , strtotime($suspeito->dataNascimento))}}</p></P>
            <P style="font-weight: bold;" class="registroScp">CPF:<br><p class="registroScpf">{{$suspeito->cpf}}</p></P>
            <P style="font-weight: bold;" class="registroSr">RG:<br><p class="registroSrg">{{$suspeito->rg}}</p></P>
            <p style="font-weight: bold;" class="registroSe">ESTADO:<br><p class="registroSestado">{{$suspeito->estado}}</p></p>
            <P style="font-weight: bold;" class="registroSc">CIDADE:<br><p class="registroScidade">{{$suspeito->cidade}}</p></P>
            <P style="font-weight: bold;" class="registroSu">ENDEREÇO:<br><p class="registropais">{{$suspeito->endereco}}</p></P>
            <P style="font-weight: bold;" class="registroSu">NOMDE DO PAI:<br><p class="registropais">{{$suspeito->nomePai}}</p></P>
            <P style="font-weight: bold;" class="registroSu">NOMDE DA MÃE:<br><p class="registropais">{{$suspeito->nomeMae}}</p></P>
            <P style="font-weight: bold;" class="registroSu">LOCAL DE ATUAÇÃO:<br><p class="registropais">{{$suspeito->localAtuacao}}</p></P>
            <P style="font-weight: bold;" class="registroObs">OBSERVAÇÕES RELACIONADAS AO SUSPEITO:<br><p class="registroObss">{{$suspeito->obs}}</p></P>
        </div>

        <form action="{{route('suspeitos.destroy', $suspeito)}}" method="POST">
            @csrf
            <a class="btnSuspeitoRegis btn btn-success" href="{{route('registrar', $suspeito)}}">Registrar Crime</a>
            <a class="btnSuspeitoVisua btn btn-success"  href="{{route('crimes', $suspeito)}}">Visualizar Crimes</a>
            @method('DELETE')
            <a onclick="confirma()" class="btnSuspeitoExclu btn btn-danger" >Excluir Registro</a>
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