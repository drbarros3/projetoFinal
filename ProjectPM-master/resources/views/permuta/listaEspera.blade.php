@extends('inicial')

@section('body')
<div id="tabela2">
    <ul class="list-group">
        <li id="tabsus" id="litable" class="list-group-item active">
            <h4 class="h4nome">Solicitante</h4>
            <h4 class="tituloPermuta">Status</h4>
            </h4>
        </li>
        @foreach($permutas as $per)
        @if($per->status != 'Espera' && $per->matricula == Auth::user()->matricula || $per->status != 'Espera' && $per->escaladoMatricula == Auth::user()->matricula || $per->status == "Espera")

        <a href="{{route('permutas.show', $per)}}">
            <li id="tabela2" class="list-group-item">
                <h4 class="h4nome">{{$per->nome}}</h4>
                <h4 class="tituloPermuta">{{$per->status}}</h4>
            </li>
        </a>
        @endif
        @endforeach
    </ul>
</div>
@endsection('body')