@extends('inicial')

@section('body')
<div id="tabela2">
    <ul class="list-group">
        <li id="tabsus" id="litable" class="list-group-item active">
            <h4 class="h4nome">Solicitante</h4>
            <h4 class="statusDispensa">Status</h4>
            </h4>
        </li>
        @foreach($dispensa as $disp)
        @if($disp == "")
        <h1>Nenhuma Dispensa solicitada</h1>
        @endif
        @if(Auth::user()->matricula == $disp->Matricula || Auth::user()->setorAtuacao == 'SPO' ||
        Auth::user()->chefedoSetor == 'SPO' || Auth::user()->chefedoSetor == $disp->setorAtuacao )
        <a href="{{route('dispensa.show', $disp)}}">
            <li id="tabela2" class="list-group-item">
                <h4 class="h4nome">{{$disp->Solicitante}}</h4>
                <h4 class="statusDispensa">{{$disp->Status}}</h4>
                <h4 style="left:83%" class="h4qtd">
                    @if(Auth::User()->matricula == $disp->Matricula && $disp->Status == "Aguardando Confirmação")
                    <form action="{{route('dispensa.destroy', $disp)}}" method="POST">
                        <div id="popupcx">
                            <div id="popupimg">
                                <img src="/imgs/PMBA.png" width="50" height="50" alt="">
                            </div>
                            <p style="position: relative; left: 20px;" id="popuptxt">Deseja realmente prosseguir com a ação ?</p>
                            <p>
                                <input type="submit" id="popupbtnsim" value="SIM" class="btn btn-success"><input type="button" onclick="nao()" id="popupbtnnao" value="NÃO" class="btn btn-danger">
                            </p>
                        </div>
                        @csrf @method('DELETE')
                        <a onclick="confirma()" class="btn btn-danger">Cancelar Solicitação</a>
                    </form>
                    @endif
                </h4>
            </li>
        </a>
        @endif


        @endforeach
        </li>
    </ul>
</div>
@endsection('body')