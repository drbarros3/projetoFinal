@extends('inicial')

@section('body')
<h1 id="titu"> Solicitação de Permuta </h1>
<div id="spo">
    <p id="via">VIA DA SPO</p>
    <p id="spo">AUTORIZO EM___/___/___ _____________________ Chefe da SPO</P>
    <div style="display: none"><input type="text" id="idPermuta" value="{{$permuta->id}}"></div>
    @if(Auth::user()->setorAtuacao == 'SPO' && $permuta->status == 'Confirmada' || Auth::user()->chefedoSetor == 'SPO'  && $permuta->status == 'Confirmada')
    <div class="butaoSPO">
        <a href="{{route('spo', $permuta->id)}}" class="btn btn-primary" id="btnspoSim" data-confirm='data-confirm'>OK</a>
        <a href="{{route('nao', $permuta->id)}}" data-confirm='data-confirm' class="btn btn-primary" id="btnspoNao">Não</a>
        <a href="{{route('refazer', $permuta->id)}}" class="btn btn-primary" id="btnspoRefazer" data-confirm='data-confirm'>Refazer Permuta</a>
    </div>
    @endif
</div>
</div>
<div class="cmd">
    <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO ( ) INDEFERIMENTO ( ) _____________________<br>CMD PEL</p>
    @if(Auth::user()->chefedoSetor == $permuta->setorAtuacao  && $permuta->status == "Confirmada" && $permuta->assinaturaCMD == '')
        <a href="{{route('cmd', $permuta->id)}}" type="button" class="btn btn-primary" id="btncmdSim" data-confirm='data-confirm'>OK</a>
        <a href="{{route('naoCMD', $permuta->id)}}" class="btn btn-primary" id="btncmdNao" data-confirm='data-confirm'>Não</a>
        <a href="{{route('refazer', $permuta->id)}}" class="btn btn-primary" id="btncmdRefazer" data-confirm='data-confirm'>Refazer Permuta</a>
    @endif
</div>
<div class="divpermuta">
    <p style="position: relative; text-align:center; ">POLÍCIA MILITAR DA BAHIA <br> COMANDO DE POLICIAMENTO REGIONAL LESTE <br> 65ª CIPM - FEIRA DE SANTANA</p>
    <div class="corpoPermuta">
        <h1 id="tpermuta"><b>PERMUTA</b></h1>
        <p style="position: relative; right:-30px">Eu, {{$permuta->nome}}, Mat.:{{$permuta->matricula}} solicito a V.Sª permulta do serviço </p>
        <p style="position: relative; right:-7px">para o qual estou devidamente escalado no {{$permuta->local}} no dia {{ date('d/m/Y', strtotime($permuta->dia_do_servico))}} das {{$permuta->hora_inicial}} às {{$permuta->hora_final}}</p>
        <p style="position: relative; right:9px">com o, {{$permuta->escalado}}, Mat. {{$permuta->escaladoMatricula}} que se encontra escalado no {{$permuta->local}}</p>
        <p style="position: relative; right:9px">no dia {{ date('d/m/Y', strtotime($permuta->escaladoDia_do_servico))}}, das {{$permuta->escaladoHora_inicial}} às {{$permuta->escaladoHora_final}} , tendo em vista</p>
        <p> {{$permuta->virtude}}</p>
        <p><b>Declaro que a referida permuta está em conformidade com o preceituado no Art. 2º § 2º, Portaria N° 067 - CG/11.</b></p>
        <p>Feira de Santana, ____/____/_____</p>
        <p style="position: relative; top:20px; text-align: center; justify-content: center;"">__________________________________<br>Solicitante <p style="position: relative; text-align: center; justify-content: center; top:30px">__________________________________<br>Substituto</p>
        </p>
    </div>
</div>
@if($permuta->matricula == Auth::User()->matricula && $permuta->status == 'Permuta aceita')
<a class=" btnOkPermuta btn btn-success" data-confirm='data-confirm' href="{{route('atualizarStatus', $permuta->id)}}" >OK</a>
<a class=" btnRefazerPermuta btn btn-danger" data-confirm='data-confirm'  href="{{route('refazer', $permuta->id)}}" >Refazer</a>
@endif

@endsection('body')