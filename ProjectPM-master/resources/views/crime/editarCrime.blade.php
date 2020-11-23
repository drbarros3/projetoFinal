@extends('inicial')

@section('body')
<h1>Crimes</h1>
<form action="{{route('crimes.update', $crime)}}" method="POST">
    @csrf
    @method('PUT')
    <div id="div_susp">
        <div class="vulgosus">
            <label for="crime">Crime</label>
            <input type="text" class="form-control" name="crime" id="crime" value="{{$crime->crime}}">
        </div>
        <div class="comparsa">
            <label for="comparsa">comparsa</label>
            <input type="text" class="form-control" name="comparsa" id="comparsa" value="{{$crime->comparsa}}">
        </div>
        <div class="comparsa">
            <label for="condutor">Conduzido por: </label>
            <input type="text" class="form-control" name="condutor" value="{{$crime->conduzido_por}}" id="comparsa">
        </div>

        <div class="datacondução">
            <label for="data">Data da prisão</label>
            <input type="date" class="form-control" name="data" id="data" value="{{$crime->data}}">
        </div>
        <div class="btnsus">
            <button id="btnsus" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
@endsection('body')