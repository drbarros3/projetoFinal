@extends('inicial')

@section('body')
<form action="{{route('abono.store')}}" method="POST">
        @csrf
        <h1>Abono de Serviço</h1>
        <div id="div_ab">
            <div class="formulario pl-5 ">
                <div class="nomeabono col-3 {{$errors->has('nome') ? 'has-error' : ''}}">
                    <label for="nomeabono">Eu</label>
                    <input class="form-control" name="nome" id="nomeabono" value="{{Auth::User()->nome}}" value="{{old('nome')}}">
                    @if($errors->has('nome'))
                        <span class="help-block" style="color: red">
                            {{$errors->first('nome')}}
                        </span>
                    @endif
                </div>
                <div class="matabono col-3 pt-2 {{$errors->has('mat') ? 'has-error' : ''}}">
                    <label for="matabono">Matricula:</label>
                    <input class="form-control" value="{{Auth::User()->matricula}}" value="{{old('mat')}}" name="mat" id="matabono"> 
                    @if($errors->has('mat'))
                        <span class="help-block" style="color:red">
                            {{$errors->first('mat')}}
                        </span>
                    @endif
                </div>
                <div class="textoabono pt-2  ">
                    <label>Solicito a V.S.Âª autorização para abonar o Serviço, no qual estou escalado confome informações abaixo:</label>
                </div>
                <div class="substituto col-3  {{$errors->has('substituto') ? 'has-error' : ''}}">
                    <label>Substituto:</label>
                    <input class="form-control" name="substituto" value="{{old('substituto')}}" id="substituto">
                    @if($errors->has('substituto'))
                        <span class="help-block" style="color:red">
                            {{$errors->first('substituto')}}
                        </span>
                    @endif
                </div>    
                <div class="mat_sub col-3 {{$errors->has('mat_sub') ? 'has-error' : ''}}">
                    <label style="width: 100px" >Matri­cula:</label>
                    <input class="form-control" name="mat_sub" value="{{old('mat_sub')}}" id="mat_sub">
                    @if($errors->has('mat_sub'))
                        <span class="help-block" style="color:red">
                            {{$errors->first('mat_sub')}}
                        </span>
                    @endif
                </div>
                <div class="servico col-3 {{$errors->has('servico') ? 'has-error' : ''}}">
                    <label for="servico">Serviço:</label>
                    <input class="form-control" name="servico" id="servico" value="{{old('servico')}}">
                    @if($errors->has('servico'))
                        <span class="help-block" style="color: red">
                            {{$errors->first('servico')}}
                        </span>
                    @endif
                </div>
                <div class="funcao col-3 {{$errors->has('funcao') ? 'has-error' : ''}}">
                    <label>Função:</label>
                    <input class="form-control" name="funcao" value="{{old('funcao')}}" id="funcao">
                    @if($errors->has('funcao'))
                        <span class="help-block" style="color:red">
                            {{$errors->first('funcao')}}
                        </span>
                    @endif
                </div>
                <div class="col-2 {{$errors->has('data') ? 'has-error' : ''}}">
                    <label for="data">Data</label>
                    <input type="date" name="data" class="form-control" value="{{old('data')}}" id="data">
                    @if($errors->has('data'))
                        <span class="help-block" style="color:red">
                            {{$errors->first('data')}}
                        </span>
                    @endif
                </div>
                <div class="horario col-2 {{$errors->has('horario') ? 'has-error' : ''}}">
                    <label for="horario">Dàs:</label>
                    <input class="form-control" type="time" name="horario" id="horario" value="{{old('horario')}}">
                    @if($errors->has('horario'))
                        <span class="help-block" style="color: red">
                            {{$errors->first('horario')}}
                        </span>
                    @endif
                </div>
                <div class="horario2 col-2 pl-3  pt-2 {{$errors->has('as') ? 'has-error' : ''}}">
                    <label style="width: 100px" for="as">Até às:</label>
                    <input class="form-control" type="time" name="as" value="{{old('horario')}}" id="as">
                    @if($errors->has('as'))
                        <span class="help-block" style="color: red">
                            {{$errors->first('as')}}
                        </span>
                    @endif
                </div>
                <div class="btnab pt-2 pl-3 " >
                    <button type="submit" id="btnab" class="btn btn-primary" >Solicitar</button>
                </div>
            </div>
        </div>
    </form>
@endsection('body')