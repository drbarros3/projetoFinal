@extends('inicial')

@section('body')
<form action="{{route('sub', $abono)}}" method="GET">
        @csrf
        <h1>Abono de Serviço Substituto</h1>
        <div id="div_ab">
            <div class="formulario pl-5 ">
                <div class="nomeabono col-3 ">
                    <label for="nomeabono">Eu</label>
                    <input readonly class="form-control" name="nome" id="nomeabono"  value="{{$abono->nome}}">
                    
                </div>
                <div class="matabono col-3 pt-2 ">
                    <label for="matabono">Matricula:</label>
                    <input readonly class="form-control" value="{{$abono->num_mat}}"  name="mat" id="matabono"> 
                    
                </div>
                <div class="textoabono pt-2  ">
                    <label>Solicito a V.S.Âª autorização para abonar o Serviço, no qual estou escalado confome informações abaixo:</label>
                </div>
                <div class="substituto col-3">
                    <label>Substituto:</label>
                    <input readonly class="form-control" name="substituto" value="{{Auth::User()->nome}}" id="substituto">
                    
                </div>    
                <div class="mat_sub col-3">
                    <label>Matri­cula:</label>
                    <input readonly class="form-control" name="mat_sub" value="{{$abono->mat_sub}}" id="mat_sub">
                    
                </div>
                <div class="servico col-3 ">
                    <label for="servico">Serviço:</label>
                    <input readonly class="form-control" name="servico" id="servico" value="{{$abono->servico}}">
                    
                </div>
                <div class="funcao col-3 ">
                    <label>Função:</label>
                    <input readonly class="form-control" name="funcao" value="{{$abono->funcao}}" id="funcao">
                    
                </div>
                <div class="horario col-2 ">
                    <label for="horario">Horario:</label>
                    <input readonly class="form-control" type="time" name="horario" id="horario" value="{{$abono->das}}">
                    
                </div>
                <div class="horario2 col-2 pl-3  pt-2">
                    <label for="as">Até as:</label>
                    <input readonly class="form-control" type="time" name="as" value="{{$abono->as}}" id="as">
                    
                </div>
                <a onclick="confirma()" id="btndispensa" class="btn btn-primary">Confirmar</a>
                <a data-confirm='data-confirm'  href="{{route('refazerAbono', $abono->id)}}" id="btndispensa" class="btn btn-danger">Refazer</a>
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