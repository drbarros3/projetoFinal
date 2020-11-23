@extends('inicial')

@section('body')
    <div id="tabela2">
        <ul class="list-group">
            <li id="tabsus" id="litable" class="list-group-item active"><h4 class="h4nome">Solicitante</h4><h4 class="statusAbono">Status</h4></h4></li>
                @foreach($abonos as $abono)
                    @if(Auth::User()->matricula == $abono->num_mat || Auth::User()->matricula == $abono->mat_sub || Auth::User()->chefedoSetor == $abono->setorAtuacao)
                        <a href="{{route('abono.show', $abono)}}">
                            <li id="tabela2" class="list-group-item">
                            <h4 class="h4nome">{{$abono->nome}}</h4>
                            <h4 class="statusAbono">{{$abono->status}}</h4>
                            <h4 style="left:83%" class="h4qtd">
                        </h4></li></a>
                    @endif
                @endforeach
            </li>
        </ul>
    </div>
@endsection('body')