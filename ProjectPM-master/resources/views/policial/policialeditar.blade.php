@extends('inicial')

@section('body')
<form action="{{route('policial.update', $policial)}}" method="post" enctype="multipart/form-data">
    <h1>Atualizar Cadastro Policial</h1>
    @csrf
    @method('PUT')
    <div id="div_pol">
        <div class="nomepol {{$errors->has('nome') ? 'has-error' : '' }}">
            <label for="nomepol">Nome Completo:</label>
            <input class="form-control" name="nome" value="{{$policial->nome}}" id="nomepol" size=30>
            @if($errors->has('nome'))
            <span style="color: red" class="help->block">
                {{$errors->first('nome')}}
            </span>
            @endif
        </div>

        <div class="fotopol {{ $errors->has('foto') ? 'has-error' : '' }} ">
            <label for="fotopol">Foto:</label><br>
            <input type="file" name="foto" id="fotopol" value="{{$policial->foto}}"><br>
            @if($errors->has('foto'))
            <span style="color: red" class="help-block">
                {{ $errors->first('foto') }}
            </span>
            @endif
        </div>

        <div class="patenteTela  {{ $errors->has('patente') ? 'has-error' : '' }}">
            <label for="pelotao">Patente:</label>
            <select name="patente" id="patente">
                <option name="patente" selected>{{$policial->patente}}</option>
                <option id="postos" disabled>======POSTOS======</option>
                <option name="patente">Coronel</option>
                <option name="patente">Tenente-Coronel</option>
                <option name="patente">Major</option>
                <option name="patente">Capitão</option>
                <option name="patente">1º Tenete</option>
                <option id="graduacao" disabled>====GRADUAÇÕES====</option>
                <option name="patente">Subtenente</option>
                <option name="patente">Sargento</option>
                <option name="patente">Cabo</option>
                <option name="patente">Soldado 1ª Classe</option>
            </select>
            @if($errors->has('patente'))
            <span style="color: red" class="help-block">
                {{ $errors->first('patente') }}
            </span>
            @endif
        </div>

        <div class="mat col-sm-2 {{ $errors->has('matricula') ? 'has-error' : '' }}">
            <label for="matricula">Número de matrícula:</label>
            <input class="form-control" name="matricula" value="{{$policial->matricula}}" id="num_mat" size=30>
            @if($errors->has('matricula'))
            <span style="color: red" class="help-block">
                {{ $errors->first('matricula') }}
            </span>
            @endif
        </div>

        <div class="sexopol {{ $errors->has('sexo') ? 'has-error' : '' }} ">
            <label for="sexo">Sexo:</label><br>
            <select id="sex" value="{{old('sexo')}}" name="sexo">
                <option value="{{$policial->sexo}}">{{$policial->sexo}}</option>
                <option name="sexo">Masculino</option>
                <option name="sexo">Feminino</option>
            </select><br>
            @if($errors->has('sexo'))
            <span style="color: red" class="help-block">
                {{ $errors->first('sexo') }}
            </span>
            @endif
        </div>

        <div class="setorTela  {{ $errors->has('setor') ? 'has-error' : '' }}">
            <label for="setor">Setor:</label>
            <select name="setor" id="patente">
                <option name="setor">{{$policial->setorAtuacao}}</option>
                <option name="setor">COMANDANTE</option>
                <option name="setor">SUBCOMANDANTE</option>
                <option name="setor">ALMOXARIFADO</option>
                <option name="setor">SPO</option>
                <option name="setor">SSO</option>
                <option name="setor">CORSET</option>
                <option name="setor">SOINT</option>
                <option name="setor">1º PELOTÃO</option>
                <option name="setor">2º PELOTÃO</option>
                <option name="setor">3º PELOTÃO</option>
                <option name="setor">4º PELOTÃO</option>
                <option name="setor">5º PELOTÃO</option>
                <option name="setor">6º PELOTÃO</option>
                <option name="setor">7º PELOTÃO</option>
                <option name="setor">8º PELOTÃO</option>
            </select>
            @if($errors->has('patente'))
            <span style="color: red" class="help-block">
                {{ $errors->first('patente') }}
            </span>
            @endif
        </div>
        <div style="position: relative; margin-bottom: 0px">

            @if(Auth::user()->chefe == 'Sim')
            <p class="optchefe {{$errors->has('rad') ? 'has-error' : ''}} ">Chefe de Setor:
                <input onclick="Radiosim()" checked type="radio" name="rad" value="Sim" id="sim">
                <label for="nao">SIM</label>
                <input onclick="Radionao()" type="radio" name="rad" value="Não" id="nao">
                <label for="nao">NÃO</label>
                @if($errors->has('rad'))
                <span class="help-block">
                    {{$errors->first('rad')}}
                </span>
                @endif
            </p>

            @else

            <p class="optchefe {{$errors->has('rad') ? 'has-error' : ''}} ">Chefe de Setor:
                <input onclick="Radiosim()" type="radio" name="rad" value="Sim" id="sim">
                <label for="nao">SIM</label>
                <input onclick="Radionao()" checked type="radio" name="rad" value="Não" id="nao">
                <label for="nao">NÃO</label>
                @if($errors->has('rad'))
                <span class="help-block">
                    {{$errors->first('rad')}}
                </span>
                @endif
            </p>
            @endif

            <div id="SetorTela2" class="setorTela2  {{ $errors->has('setor') ? 'has-error' : '' }}">
                <label for="setorChefe">Setor:</label>
                <select name="setorChefe" id="patente">
                    <option name="setorChefe">{{$policial->chefedoSetor}}</option>
                    <option name="setorChefe">COMANDANTE</option>
                    <option name="setorChefe">SUBCOMANDANTE</option>
                    <option name="setorChefe">ALMOXARIFADO</option>
                    <option name="setorChefe">SPO</option>
                    <option name="setorChefe">SSO</option>
                    <option name="setorChefe">CORSET</option>
                    <option name="setorChefe">SOINT</option>
                    <option name="setorChefe">1º PELOTÃO</option>
                    <option name="setorChefe">2º PELOTÃO</option>
                    <option name="setorChefe">3º PELOTÃO</option>
                    <option name="setorChefe">4º PELOTÃO</option>
                    <option name="setorChefe">5º PELOTÃO</option>
                    <option name="setorChefe">6º PELOTÃO</option>
                    <option name="setorChefe">7º PELOTÃO</option>
                    <option name="setorChefe">8º PELOTÃO</option>
                </select>
                @if($errors->has('patente'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('patente') }}
                </span>
                @endif
            </div>

            <div id="Radioguarnicao" class=" guarnicao col-sm-2">
                <label for="">Guarnição</label>
                <input class="form-control" name="Chefeguarnicao" value="{{$policial->chefedaGuarnicao}}" id="guarnicao" type="text">
            </div>
        </div>

        <div style="position: relative; margin-top: 60px">
            <div class="cpfpol col-sm-2 {{ $errors->has('cpf') ? 'has-error' : '' }} ">
                <label for="cpfpol">CPF:</label>
                <input class="form-control" name="cpf" id="cpfpol" value="{{$policial->cpf}}">
                @if($errors->has('cpf'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('cpf') }}
                </span>
                @endif
            </div>
            <div class="rgpol col-sm-2 {{ $errors->has('rg') ? 'has->error' : '' }} ">
                <label for="rgpol">RG:</label>
                <input class="form-control" name="rg" id="rgpol" value="{{$policial->rg}}">
                @if($errors->has('rg'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('rg') }}
                </span>
                @endif
            </div>
            <div class="estadopol {{ $errors->has('estado') ? 'has-error' : '' }} ">
                <label for="estadopol">Estado:</label>
                <input class="form-control" name="estado" id="estadopol" value="{{$policial->estado}}">
                @if($errors->has('estado'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('estado') }}
                </span>
                @endif
            </div>
            <div class="cidadepol {{ $errors->has('cidade') ? 'has-error' : '' }} ">
                <label for="cidadepol">Cidade</label>
                <input class="form-control" name="cidade" id="cidadepol" value="{{$policial->cidade}}">
                @if($errors->has('cidade'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('cidade') }}
                </span>
                @endif
            </div>

            <div class="datanascP {{ $errors->has('dataNascimento') ? 'has-error' : '' }} ">
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" name="dataNascimento" value="{{$policial->dataNascimento}}" id="dataNascimento">
                @if($errors->has('dataNascimento'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('dataNascimento') }}
                </span>
                @endif
            </div>

            <div class="pelotaopol {{ $errors->has('pelotao') ? 'has-error' : '' }} ">
                <label for="pelotao">Unidade:</label>
                <input class="form-control" name="pelotao" id="pelotao" value="{{$policial->pelotao}}">
                @if($errors->has('pelotao'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('pelotao') }}
                </span>
                @endif
            </div>
            @if(Auth::user()->matricula == $policial->matricula)
            <div class="sen {{ $errors->has('senha') ? 'has-error' : '' }} ">
                <label for="senhap">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senhap">
                @if($errors->has('senha'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('senha') }}
                </span>
                @endif
            </div>

            <div class="confirmarsen {{ $errors->has('senhaConfirma') ? 'has-error' : '' }} ">
                <label for="senhaConfirma">Confirmar Senha:</label>
                <input type="password" class="form-control" name="senhaConfirma" id="senhap">
                @if($errors->has('senhaConfirma'))
                <span style="color: red" class="help-block">
                    {{ $errors->first('senhaConfirma') }}
                </span>
                @endif
            </div>
            @endif

            <div class="btnpol">
                <button type="submit" id="btnpol" class="btn btn-primary">Atualizar</button>
            </div>

        </div>
    </div>
</form>
@endsection('body')