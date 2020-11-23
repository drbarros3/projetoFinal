@extends('inicial')

@section('body')
<h1>Crimes</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Suspeito</th>
      <th scope="col">Crime</th>
      <th scope="col">Data</th>
      <th scope="col">Comparsa</th>
      <th scope="col">Conduzido por</th>
    </tr>
  </thead>
  <tbody>
    @foreach($crimes as $crimes)
    @if($crimes->id_suspeito == $crime)
    <tr>
      <td>{{$crimes->suspeito}}</td>
      <td>{{$crimes->crime}}</td>
      <td>{{date( 'd/m/Y' , strtotime($crimes->data))}}</td>
      <td>{{$crimes->comparsa}}</td>
      <td>{{$crimes->conduzido_por}}</td>
      <td>
        @if(Auth::User()->setorAtuacao == 'SOINT' || Auth::User()->chefedoSetor == 'SOINT'  || Auth::User()->patente == 'Coronel')
        <form action="{{route('crimes.destroy', $crimes)}}" method="POST">
          @csrf
          <a class="btn btn-success" href="{{route('crimes.edit', $crimes)}}">Editar</a>
          @method('DELETE')
          <a onclick="confirma()" class="btn btn-danger">Excluir</a>
          <div id="popupcx">
            <div id="popupimg">
              <img src="/imgs/PMBA.png" width="50" height="50" alt="">
            </div>
            <p id="popuptxt">Deseja realmente prosseguir com a ação ?</p>
            <p>
              <input type="submit" id="popupbtnsim" value="SIM" class="btn btn-success"><input type="button" onclick="nao()" id="popupbtnnao" value="NÃO" class="btn btn-danger">
            </p>
          </div>
        </form>
        @endif
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
@endsection('body')