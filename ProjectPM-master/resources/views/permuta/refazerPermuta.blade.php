@extends('inicial')

@section('body')
    <form  action="{{route('permutas.edit', $permuta)}}" method="GET" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <h1 id="titu">Refazer Permuta</h1>

            <div class="escalado {{$errors->has('nome') ? 'has-error' : ''}}">
                <label for="escalado">Eu: </label>
                <input id="imp" type="text" class="form-control" value="{{ Auth::User()->nome }}" name="nome" id="nome" size=30>
                @if($errors->has('nome'))
                    <span style="color: red" class="help-block">
                        {{$error->first('nome') }}
                    </span>
                @endif
            </div>

            <div class="escalado {{$errors->has('matricula') ? 'has-error' : ''}}">
                <label for="escalado ">Matricula: </label>
                <input id="imp" type="text" class="form-control" value=" {{ Auth::User()->matricula }} " name="matricula" id="matricula" size=30>
                @if($errors->has('matricula'))
                    <span style="color: red" class="help-block">
                        {{$errors->first('matricula')}}
                    </span>
                @endif
            </div>

            <div class="escalado {{$errors->has('local') ? 'has-error' : ''}}">
                <label for="escalado">Local: </label>
                <input id="imp" type="text" class="form-control" name="local" id="local" value = "{{ old('local') }}" size=30>
                @if($errors->has('local'))
                    <span style="color: red" class="help-block">
                        {{$errors->first('local')}}
                    </span>
                @endif
            </div>

            <div class="dia {{$errors->has('dia') ? 'has-error' : ''}}">
                <label for="dia">no dia</label>
                <input type="date" class="form-control" name="dia" value="{{ old('dia') }}" id="dia" size=30>
                @if($errors->has('dia'))
                    <span style="color: red" class="help-block">
                        {{$errors->first('dia')}}
                    </span>
                @endif
            </div>
            <div class="hora {{$errors->has('das') ? 'has-das' : ''}}">
                <label for="hora">Das:</label>
                <input type="time" class="form-control" name="das" value="{{ old('das') }}" id="hora"  size=30> 
                @if($errors->has('das'))
                    <span style="color: red" class="help-block">
                        {{$errors->first('das')}}
                    </span>
                @endif
            </div>
            <div class="ass {{$errors->has('as') ? 'has-error' : ''}}">
                <label for="hora">Às:</label>
                <input type="time" class="form-control" name="as" value="{{old('as')}}" id="hora"  size=30> 
                @if($errors->has('as'))
                    <span class="help-block">
                        {{$errors->first('as')}}
                    </span>
                @endif
            </div>
            <div class="virtude {{$errors->has('virtude') ? 'has->errror' : ''}}">
                <label for="virtude">Tendo em vista:</label><br>
                <textarea name="virtude" id="virtude" >{{old('virtude')}}</textarea><br>
                @if($errors->has('virtude'))
                    <span class="help-block">
                        {{$errors->first('virtude')}}
                    </span>
                @endif
            </div>
            <div class="btnpermuta">
            <input type="button" id="btnpermuta" class="btn btn-primary" value="Refazer" onclick="confirma()" >
            </div>

            <div id="popupcx">
                <div id="popupimg" >
                    <img src="/imgs/PMBA.png" width="50" height="50" alt="">
                </div>
                <p id="popuptxt">Deseja realmente prosseguir com a ação ?</p>
                <p>
                <input type="submit" id="popupbtnsim"  value="SIM" class="btn btn-success" ><input type="button" onclick="nao()"  id="popupbtnnao" value="NÃO" class="btn btn-danger">
                </p>
            </div>
    </form>
@endsection('body')