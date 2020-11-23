@extends('inicial')

@section('body')
<div class="text-center">

    @if($abono->status == "Nâo Autorizado")
    <h1 style="color: red">Abono não autorizado</h1>
    @endif
    <div style="position: relative; top: 50px; " >
        <div class="">
            <p style="margin: 0px auto"><b>POLÍCIA MILITAR DA BAHIA</b></p>
            <p style="margin: 0px auto"><b>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</b></p>
            <p style="margin: 0px auto"><b>COMANDO DE POLICIAMENTO REGIONAL LESTE</b></p>
            <p><b>65º COMPANHIA INDEPENDENTE DE POLÍCIA MILITAR</b></p>
        </div>
        <div>
            <p><b>FORMULÁRIO DE ABONO DE SERVIÇO.</b></p>
        </div>
        <div>
            <p style="margin: 0px auto">Eu, {{$abono->nome}}, MAT: {{$abono->num_mat}}</p>
            <p style="margin: 0px auto">solicito a V.S.ª autorização para abonar o serviço, no qual estou escalado conforme</p>
            <p style="margin: 0px auto">informações abaixo:</p>
            <p>SUBSTITUTO: {{$abono->substituto}}, Matricula: {{$abono->mat_sub}}</p>
        </div>
        <div class="tabelaAbono">
            <ul class=" row ">
                <li class="list-group-item col-md-1">SERVIÇO</li>
                <li class="list-group-item col-md-3">{{$abono->servico}}</li>
                <li class="list-group-item col-md-1">FUNÇÃO</li>
                <li class="list-group-item col-md-2">{{$abono->funcao}}</li>
            </ul>
            <ul class=" row ">
                <li class="list-group-item col-md-1">DATA</li>
                <li class="list-group-item col-md-3">{{date('d/m/Y', strtotime($abono->data))}}</li>
                <li class="list-group-item col-md-1">HORÁRIO</li>
                <li class="list-group-item col-md-2">Dàs {{$abono->das}}, Às {{$abono->as}}</li>
            </ul>
            <ul class=" row ">
                <li class="list-group-item col-md-1 px-2">ASSINATURA</li>
                <li class="list-group-item col-md-6"></li>
            </ul>
        </div>
        <div class="text-center">
            <p style="margin: 0px auto">Após assinarmos, estamos cientes que a o Comandante não é responsável por</p>
            <p style="margin: 0px auto">gerenciar qualquer situação em que haja conflito ou divergência daquilo que foi acordado</p>
            <p style="margin: 0px auto">entre as partes.</p>
        </div>

        <div class="text-center">
            @if($abono->dataConfirmacao == "")
            <p>Em ____de_____________de_________,</p>
            @else
            <p style="display: none">{{setlocale(LC_ALL, 'pt_BR')}}</p>
            <p>Em {{ date('d', strtotime($abono->dataConfirmacao))}} de {{ ucfirst(strftime('%B', strtotime($abono->dataConfirmacao)))}} de {{date('Y', strtotime($abono->dataConfirmacao))}} </p>
            @endif
        </div>
        <div class="text-center" style="position: relative; top: 30px">
            <p style="margin: 0px auto">_______________________________________________________</p>
            <p>Solicitante</p>
        </div>
        <div class="text-center" style="position: relative; top: 30px">
            <p style="margin: 20px auto">AUTORIZADO</p>
            @if($abono->dataConfirmacaoCMD == "")
            <p>Em ____/____/______</p>
            @else
            <p style="position: relative; top: -20px">{{ date('d/m/Y', strtotime($abono->dataConfirmacaoCMD))}}</p>
            @endif
            @if($abono->status == 'Confirmado e Finalizado')
                <p style="margin: -10px auto"><b>{{$abono->assinaturaCMD}}</b></p>
            @endif
            <p style="margin: 0px auto">________________________________</p>
            <p>CMT DO PELOTÃO</p>
        </div>
        
        <div style="position: relative; margin: 50px">
            @if(Auth::user()->chefedoSetor == $abono->setorAtuacao && $abono->status == "Aguardando confirmação do CMD")
                <a href="{{route('simAbonoCMD', $abono->id)}}" type="button" class="btn btn-primary" id="btncmdSim" data-confirm='data-confirm'>OK</a>
                <a href="{{route('naoAbonoCMD', $abono->id)}}" class="btn btn-primary" id="btncmdNao" data-confirm='data-confirm'>Não</a>
                <a href="{{route('refazerAbono', $abono->id)}}" class="btn btn-primary" id="btncmdRefazer" data-confirm='data-confirm'>Refazer Abono</a>
            @endif
        </div>
        @if($abono->status == 'Confirmado e Finalizado')
            <a href="{{route('imprimirAbono', $abono)}}" class="btn btn" style="position: relative; margin: 20px; height: 40px; width: 150px; color: white; background-color: blue;">IMPRIMIR</a>    
        @endif
    </div>
</div>
@endsection('body')