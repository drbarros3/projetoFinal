@extends('inicial')

@section('body')
<div id="tabela2" >
        <ul class="list-group">
            <li id="litable" class="list-group-item active">Lista de Permutas</li>
            @foreach($permutas as $per)
                @if($per->status == 'Confirmada' && Auth::user()->chefedoSetor == 'SPO' && $per->status != "Confirmada e Finalizada"||  Auth::user()->chefedoSetor == $per->setorAtuacao && $per->status != "Confirmada e Finalizada" && $per->status == 'Confirmada'|| Auth::user()->patente == 'Coronel' && $per->status == 'Confirmada' && $per->status != "Confirmada e Finalizada" )
                    <a href="{{route('permutas.show', $per)}}"><li id="tabela2" class="list-group-item">{{$per->nome}}</li></a>
                @endif
            @endforeach
        </ul>
    </div>  
@endsection('body')