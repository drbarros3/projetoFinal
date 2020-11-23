@extends('inicial')

@section('body')
<div class="text-center pt-5">
    @if($dispensa->Status == "Nâo Autorizada" || $dispensa->Status == 'Indeferimento')
    <h1 style="color: red">Dispensa não autorizada</h1>
    @endif
    <div class="headDispensa">
        <p style="margin: 0px auto"><b>POLÍCIA MILITAR DA BAHIA</b></p>
        <p style="margin: 0px auto"><b>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</b></p>
        <p style="margin: 0px auto"><b>COMANDO DE POLICIAMENTO REGIONAL LESTE</b></p>
        <p style="margin: 0px auto"><b>65º COMPAINHA INDEPENDENTE DE POLÍCIA MILITAR</b></p>
        <p style="margin: 0px auto"><b>SEÇÃO DE PLANEJAMENTO OPERACIONAL</b></p>
    </div>
    <div style="position: relative; top: -150px">
        @if($dispensa->Status != 'Confirmada e Finalizada' )
        <div id="spo">
            <p id="via">VIA DA SPO</p>  
            <p id="spo">AUTORIZO EM___/___/___ _____________________ Chefe da SPO</P>
            <div style="display: none"><input type="text" id="idPermuta"></div>
            @if(Auth::user()->chefedoSetor == 'SPO' && $dispensa->Status == "Confirmada" || Auth::user()->chefedoSetor == 'SPO' && $dispensa->Status == "Aguardando Confirmação" )
            <div class="butaoSPO">
                <a href="{{route('spoDispensa', $dispensa->id)}}" class="btn btn-primary" id="btnspoSim" data-confirm='data-confirm'>OK</a>
                <a href="{{route('naoDispensa', $dispensa->id)}}" data-confirm='data-confirm' class="btn btn-primary" id="btnspoNao">Não</a>
                <a href="{{route('refazerDispensa', $dispensa->id)}}" class="btn btn-primary" id="btnspoRefazer" data-confirm='data-confirm'>Refazer Dispensa</a>
            </div>
            @endif
        </div>
        @endif
        @if($dispensa->Status == 'Confirmada pelo SPO' || $dispensa->Status == 'Confirmada e Finalizada')
        <div id="spo">
            <p id="via">VIA DA SPO</p>
            <p id="spo">AUTORIZO EM {{ date('d/m/Y', strtotime($dispensa->dataSPO))}}
                <p style="position: relative; top: -60px"> {{$dispensa->assinaturaSPO}}</p>
                <p style="position: relative; top: -90px">_______________</p> <br>
                <p style="position: relative; top: -130px"> Chefe da SPO</P>
        </div>
        @endif
        @if($dispensa->assinaturaCMD == '')
        <div class="cmd">
            <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO ( ) INDEFERIMENTO ( ) _____________________<br>CMD PEL</p>
            @if(Auth::user()->chefedoSetor == $dispensa->setorAtuacao && $dispensa->Status != 'Confirmada e Finalizada')
            <a href="{{route('cmdDispensa', $dispensa->id)}}" type="button" class="btn btn-primary" id="btncmdSim" data-confirm='data-confirm'>OK</a>
            <a href="{{route('naoCMDDispensa', $dispensa->id)}}" class="btn btn-primary" id="btncmdNao" data-confirm='data-confirm'>Não</a>
            <a href="{{route('refazerDispensa', $dispensa->id)}}" class="btn btn-primary" id="btncmdRefazer" data-confirm='data-confirm'>Refazer Dispensa</a>
            @endif
        </div>
        @endif
        @if($dispensa->assinaturaCMD != '')
        <div class="cmd">
            @if($dispensa->optCMD == 'Deferimento')
                <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO ( X ) INDEFERIMENTO ( )
                <p style="position: relative; top: -15px">{{$dispensa->assinaturaCMD}}</p>
                <p style="position: relative; top: -45px"> _____________________</p>
                <p style="position: relative; top: -65px">CMD PEL</p>
            @endif
            @if($dispensa->optCMD == 'Indeferimento')
                <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO ( ) INDEFERIMENTO ( X )
                <p style="position: relative; top: -15px">{{$dispensa->assinaturaCMD}}</p>
                <p style="position: relative; top: -45px"> _____________________</p>
                <p style="position: relative; top: -65px">CMD PEL</p>
            @endif
        </div>
        @endif
    </div>
</div>
<div class="dispensa">
    <p style="margin: 0px auto">Eu, {{$dispensa->Solicitante}},</p>
    <p style="margin: 0px auto">Mat. {{$dispensa->Matricula}}, integrante do {{$dispensa->Pelotao}}º Pelotão desta CIPM,</p>
    <p style="margin: 0px auto">Solicito a V.Sª. dispensa do serviço para o qual estou devidamente escalado</p>
    <p style="margin: 0px auto">no(a) {{$dispensa->escalado}}, no(s) dia(s) {{date('d/m/Y', strtotime($dispensa->dia_do_servico))}}</p>
    <p style="margin: 0px auto">das {{$dispensa->hora_inicial}} às {{$dispensa->hora_final}}, em virtude de</p>
    <p>{{$dispensa->virtude}}</p>
    <p>Feira de Santana, ____de________________de________.</p>
    <p style="margin: 0px auto">______________________________________</p>
    <p style="margin: -10px auto">Solicitante</p>
    @if($dispensa->Status == 'Confirmada e Finalizada')
    <a href="{{route('imprimirDispensa', $dispensa)}}" class=" btnButtonImprimir btn btn">IMPRIMIR</a>
    @endif
</div>
@endsection('body')