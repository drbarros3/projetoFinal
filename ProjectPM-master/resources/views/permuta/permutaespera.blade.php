@extends('inicial')

@section('body')
    <form>
        <h1 id="titu"> Solicitação de Permuta</h1>
        <div id="permuta">
            <div id="spo">
            <p id="via">VIA DA SPO</p>
                <p id="spo">AUTORIZO EM___/___/___ _____________________  Chefe da SPO</P>
            </div>
            <div class="cmd">
                <p>COMANDANTE DO PELOTÃO <br> OPINO POR: DEFERIMENTO (          ) INDEFERIMENTO (  ) _____________________<br>CMD PEL</p>
            </div>
            <p style="position: relative; text-align:center; top:-190px">POLÍCIA MILITAR DA BAHIA <br> COMANDO DE POLICIAMENTO REGIONAL LESTE <br> 65ª CIPM - FEIRA DE SANTANA</p>
            <div style="position: relative; top:-150px">
                <h1 id="tpermuta"><b>PERMUTA</b></h1>
                <p style="position: relative; right:-30px">Eu, {{$permuta->nome}}, Mat.:{{$permuta->matricula}} solicito a V.Sª permulta do serviço </p>
                <p style="position: relative; right:-7px">para o qual estou devidamente escalado no {{$permuta->local}} no dia {{ date('d/m/Y', strtotime($permuta->dia_do_servico))}} das {{$permuta->hora_inicial}} às {{$permuta->hora_final}}</p>
                <p style="position: relative; right:9px">com o, {{$permuta->escalado}}, Mat. {{$permuta->escaladoMatricula}} que se encontra escalado no {{$permuta->escaladoLocal}}</p>
                <p style="position: relative; right:9px">no dia {{ date('d/m/Y', strtotime($permuta->escaladoDia_do_servico))}}, das {{$permuta->escaladoHora_inicial}} às {{$permuta->escaladoHora_final}} , tendo em vista</p><p> {{$permuta->virtude}}</p>
                <p><b>Declaro que a referida permuta está em conformidade com o preceituado no Art. 2º § 2º, Portaria N° 067 - CG/11.</b></p>
                <p>Feira de Santana, ____/____/_____</p>
                <p style="position: relative; top:20px; text-align: center; justify-content: center;">__________________________________<br>Solicitante <p style="position: relative; text-align: center; justify-content: center; top:30px">__________________________________<br>Substituto</p></p>                    
                @if($permuta->matricula != Auth::User()->matricula)
                    <a class="btnAceitarPermuta btn btn-success" data-confirm='data-confirm' href="{{route('aceitar', $permuta)}}">Aceitar</a>
                @endif

                
            </div>
        </div>
    </form>
@endsection('body')