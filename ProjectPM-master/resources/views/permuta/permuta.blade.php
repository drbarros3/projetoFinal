@extends('inicial')

@section('body')
<div id="permuta">
    <div id="spo">
        <p id="via">VIA DA SPO</p>
        @if($permuta->assinaturaSPO == "")
            <p id="spo">AUTORIZO </p>
            <p style="position: relative; top: -60px"> EM___/___/___</p>
            <p style="position: relative; top: -75px">_______________</p> <br>
            <p style="position: relative; top: -110px"> Chefe da SPO</P>
        @else
            <p id="spo">AUTORIZO EM {{ date('d/m/Y', strtotime($permuta->dataSPO))}}
            <p style="position: relative; top: -60px"> {{$permuta->assinaturaSPO}}</p>
            <p style="position: relative; top: -90px">_______________</p> <br>
            <p style="position: relative; top: -130px"> Chefe da SPO</P>
        @endif

    </div>
    <div style="position:relative; top:-70px; left :900px" class="cmd">
        @if($permuta->optCMD == 'Deferimento')
        <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO ( X ) INDEFERIMENTO ( )
            <p style="position: relative; top: -15px">{{$permuta->assinaturaCMD}}</p>
            <p style="position: relative; top: -45px"> _____________________</p>
            <p style="position: relative; top: -65px">CMD PEL</p>
            @endif
            @if($permuta->optCMD == 'Indeferimento')
            <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO ( ) INDEFERIMENTO ( X )
                <p style="position: relative; top: -15px">{{$permuta->assinaturaCMD}}</p>
                <p style="position: relative; top: -45px"> _____________________</p>
                <p style="position: relative; top: -65px">CMD PEL</p>
                @endif
                @if($permuta->optCMD == '')
                <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO ( ) INDEFERIMENTO (  )
                <p style="position: relative; top: -10px"> _____________________</p>
                <p style="position: relative; top: -30px">CMD PEL</p>
                @endif
    </div>
    <p style="position: relative; text-align:center; top:-150px">POLÍCIA MILITAR DA BAHIA <br> COMANDO DE POLICIAMENTO REGIONAL LESTE <br> 65ª CIPM - FEIRA DE SANTANA</p>
    <div style="position: relative; top:-120px; text-align: justify-center">
        <h1 id="tpermuta"><b>PERMUTA</b></h1>
        <p>Eu, {{$permuta->nome}}, Mat.:{{$permuta->matricula}} solicito a V.Sª permulta do serviço </p>
        <p>para o qual estou devidamente escalado no {{$permuta->local}} no dia {{ date('d/m/Y', strtotime($permuta->dia_do_servico))}} das {{$permuta->hora_inicial}} às {{$permuta->hora_final}}</p>
        <p>com o,{{$permuta->escalado}}, Mat.:{{$permuta->escaladoMatricula}} que se encontra escalado no {{$permuta->escaladoLocal}}</p>
        <p>no dia{{ date('d/m/Y', strtotime($permuta->escaladoDia_do_servico))}}, das {{$permuta->escaladoHora_inicial}} às {{$permuta->escaladoHora_final}}, tendo em vista{{$permuta->virtude}}</p>
        <p><b>Declaro que a referida permuta está em conformidade com o preceituado no Art. 2º § 2º, Portaria N° 067 - CG/11.</b></p>
        @if($permuta->dataConfirmacao == "")<p>Feira de Santana, ____/____/_____</p>@endif
        @if($permuta->dataConfirmacao != "")<p>Feira de Santana, {{ date('d/m/Y', strtotime($permuta->dataConfirmacao))}}</p>@endif
        <p style="position: relative; right:200px">{{$permuta->nome}}</p>
        <p style="position: relative; top: -30px; right:200px">__________________________________</p>
        <p style="position: relative; top: -30px; right:200px">Solicitante</p>
        <p style="position: relative; left:200px; top:-117px">{{$permuta->escalado}}</p>
        <p style="position: relative; left:200px; top:-147px">__________________________________</p>
        <p style="position: relative; top: -148px; left:200px">Substituto</p>
    </div>
    <a href="{{route('imprimirPermuta', $permuta)}}" class="btn btn" style="position: relative; top: -250px; height: 40px; width: 150px; color: white; background-color: blue;">IMPRIMIR</a>
</div>
@endsection('body')