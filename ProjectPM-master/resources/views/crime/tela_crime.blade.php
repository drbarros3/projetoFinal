@extends('inicial')

@section('body')
    <h1>Crimes</h1>
    <form action="{{route('crimes.store')}}" method="POST">
    @csrf   
        <div id="div_susp">
            <div class="nomesus {{ $errors->has('sus') ? 'has->error' : '' }}">
                <label for="susp">Suspeito</label>
                <input type="text" class="form-control" name="susp" id="susp"  value="{{$crime->nome}}">
                @if($errors->has('sus'))
                    <span style="color: red" class="help-block">
                        {{ $errors->first('susp') }}
                    </span>
                @endif
            </div>
            <input type="hidden" name="id" value="{{$crime->id}}">
            <div class="vulgosus {{ $errors->has('crime') ? 'has->error' : '' }} ">
                <label for="crime">Crime</label>
                <input type="text" class="form-control" value="{{ old('crime') }}" name="crime" id="crime">
                @if($errors->has('crime'))
                    <span style="color: red" class="help-block">
                        {{ $errors->first('crime') }}
                    </span>
                @endif
            </div>
            <div class="comparsa">
                <label for="comparsa {{ $errors->has('comparsa') ? 'has->error' : '' }} ">comparsa</label>
                <input type="text" class="form-control" value="{{ old('comparsa') }}" name="comparsa" id="comparsa">
                @if($errors->has('comparsa'))
                    <span style="color: red" class="help-block">
                        {{ $errors->first('comparsa') }}
                    </span>
                @endif
            </div>
            <div class="comparsa {{ $errors->has('comdutor') ? 'has->error' : '' }} ">
                <label for="condutor">Conduzido por: </label>
                <input type="text" class="form-control" name="condutor" value="{{ old('condutor') }}" id="comparsa">

                @if($errors->has('condutor'))
                    <span style="color: red" class="help-block">
                        {{ $errors->first('condutor') }}
                    </span>
                @endif
            </div>
            
            <?php date_default_timezone_set('America/Sao_Paulo'); $now = new DateTime(); $datetime = $now->format('Y-m-d');?>
            <div class="datacondução">
                <input class="form-control" name="data" type="hidden" value="{{$datetime}}">
            </div>
            <div class="btnsus">
                <button id="btnsus" type="submit" class="btn btn-primary">Finalizar cadastro</button>
            </div>
        </div>
    </form>
@endsection('body')