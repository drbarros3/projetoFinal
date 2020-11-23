@extends('inicial')

@section('body')
    <form  action="{{route('permutas.update', $permuta)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <div>
            <h1 id="titu">Solicitação de permuta</h1>
            <h2 class="titloPermut">Dados do Solicitante</h2>
            
                <div class="escalado {{$errors->has('nome') ? 'has-error' : ''}} ">
                    <label for="escalado">Eu:</label>
                    <input readonly type="text" id="imp" class="form-control" name="nome" id="nome" value="{{$permuta->nome}}">
                    @if($errors->has('nome'))
                        <span class="help-block">
                            {{$errors->first('nome')}}
                        </span>
                    @endif
                </div>
                <div class="escalado {{$errors->has('matricula') ? 'has-error' : ''}} ">
                    <label for="escalado">Matricula: </label>
                    <input readonly id="imp" type="text" class="form-control" name="matricula" id="matricula" value="{{$permuta->matricula}}" >
                    @if($errors->has('matricula'))
                        <span class="help-block">
                            {{$errors->first('matricula')}}
                        </span>
                    @endif
                </div>
                
                <div class="escalado {{$errors->has('lcal') ? 'has-error' : ''}} ">
                    <label for="escalado">Local: </label>
                    <input readonly id="imp" type="text" class="form-control" name="local" id="local" value="{{$permuta->local}}">
                    @if($errors->has('local'))
                        <span class="help-block">
                            {{$errors->first('local')}}
                        </span>
                    @endif
                </div>

                <div class="dia {{$errors->has('dia') ? 'has-error' : ''}} ">
                    <label for="dia">no dia</label>
                    <input readonly type="date" class="form-control" name="dia" id="dia" value="{{$permuta->dia_do_servico}}">
                    @if($errors->has('dia'))
                        <span class="help-block">
                            {{$errors->first('dia')}}
                        </span>
                    @endif
                </div>
                <div class="hora {{$errors->has('das') ? 'has-error' : ''}} " >
                    <label for="hora">Das:</label>
                    <input readonly type="time" class="form-control" name="das" id="hora" value="{{$permuta->hora_inicial}}" > 
                    @if($errors->has('das'))
                        <span class="help-block">
                            {{$errors->first('das')}}
                        </span>
                    @endif
                </div>
                <div class="ass {{$errors->has('as') ? 'error-has' : '' }} ">
                    <label for="hora">Às:</label>
                    <input readonly type="time" class="form-control" name="as" id="ass" value="{{$permuta->hora_final}}" > 
                    @if($errors->has('as'))
                        <span class="help-block">
                            {{$errors->first('as')}}
                        </span>
                    @endif
                </div>
                <div class="virtude {{$errors->has('virtude') ? 'has-error' : ''}} ">
                    <label for="virtude">Tendo em vista:</label><br>
                    <textarea readonly name="virtude" id="virtude" >{{$permuta->virtude}}</textarea>
                    @if($errors->has('virtude'))
                        <span class="help-block">
                            {{$errors->first('virtude')}}
                        </span>
                    @endif
                </div>
            <div class="solicitante {{$errors->has('nomesub') ? 'has-error' : ''}} ">
            <h2 class="titloPermut" >Seus Dados</h2>
                <div class="escalado">
                    <label for="escalado">Eu: </label>
                    <input id="imp" type="text" class="form-control" value=" {{ Auth::User()->nome }} " name="nomesub" id="nome" size=30>
                    @if($errors->has('nomesub'))
                        <span class="help-block">
                            {{$errors->first('nomesub')}}
                        </span>
                    @endif
                </div>

                <div class="escalado {{$errors->has('matriculasub') ? 'has-error' : ''}} ">
                    <label for="escalado">Matricula: </label>
                    <input id="imp" type="text" class="form-control" name="matriculasub" value=" {{ Auth::User()->matricula }} " id="matricula" size=30>
                    @if($errors->has('matriculasub'))
                        <span class="help-block">
                            {{$errors->first('matriculasub')}}
                        </span>
                    @endif
                </div>

                <div class="escalado {{$errors->has('localsub') ? 'has-error' : ''}}">
                    <label for="escalado">Local: </label>
                    <input id="imp" type="text" class="form-control" value="{{old('localsub')}}" name="localsub" id="local" size=30>
                    @if($errors->has('localsub'))
                        <span class="help-block">
                            {{$errors->first('localsub')}}
                        </span>
                    @endif
                </div>

                <div class="dia {{$errors->has('diasub' ) ? 'has-error' : ''}} ">
                    <label for="dia">no dia</label>
                    <input type="date" class="form-control" value="{{old('diasub')}}" name="diasub" id="dia" size=30>
                    @if($errors->has('diasub'))
                        <span class="help-block">
                            {{$errors->first('diasub')}}
                        </span>
                    @endif
                </div>
                <div class="hora {{$errors->has('dassub') ? 'has-erros' : ''}} ">
                    <label for="hora">Das:</label>
                    <input type="time" class="form-control" value="{{old('dassub')}}" name="dassub" id="hora"  size=30> 
                    @if($errors->has('dassub'))
                        <span class="help-block">
                            {{$errors->first('dassub')}}
                        </span>
                    @endif
                </div>
                <div class="ass {{$errors->has('assub') ? 'has-error' : ''}} ">
                    <label for="hora">Às:</label>
                    <input type="time" class="form-control" name="assub" value="{{old('assub')}}" id="ass"  size=30> 
                    @if($errors->has('assub'))
                        <span class="help-block">
                            {{$errors->first('assub')}}
                        </span>
                    @endif
                </div>
                <div class="btnDivPer">
                    <a onclick="confirma()" id="btndispensa"  class="btn btn-primary">OK</a>
                </div>
            </div>
        </div>
        <div id="popupcx">
            <div id="popupimg" >
                <img src="/imgs/PMBA.png" width="50s" height="50" alt="">
            </div>
            <p id="popuptxt">Deseja realmente prosseguir com a ação!</p>
            <p>
            <button id="popupbtnsim" class="btn btn-success" >SIM</button><input type="button" onclick="nao()"  id="popupbtnnao" value="NÃO" class="btn btn-danger">
            </p>
        </div>
        
    </form>
@endsection('body')