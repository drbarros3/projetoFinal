<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PFC-PM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 1000px)" href="{{asset('css/medium.css')}}">
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 500px)" href="{{asset('css/small.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>

<body id="tel">
    <nav style="border: none" class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="/imgs/PMBA.png" width="50" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Início <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastrar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a id="dropdown" class="dropdown-item" href="{{route('suspeitos.create')}}">Cadastrar Suspeito</a>
                        @if(Auth::user()->setorAtuacao == 'SPO' || Auth::user()->chefedoSetor == 'SPO' || Auth::user()->patente == 'Coronel' || Auth::user()->patente == 'Major' || Auth::user()->patente == 'Capitão')
                        <a id="dropdown" class="dropdown-item" href="{{route('policial.create')}}">Cadastrar Policial</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Solicitações
                    </a>
                    <div id="dropdown" class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a id="dropdown" class="dropdown-item" href="{{route('permutas.create')}}">Permuta</a>
                        <a id="dropdown" class="dropdown-item" href="{{route('dispensa.create')}}">Dispensa</a>
                        <a id="dropdown" class="dropdown-item" href="{{route('abono.create')}}">Abono de Serviço</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Listas
                    </a>
                    <div id="dropdown" class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @if(Auth::user()->setorAtuacao == 'SPO' || Auth::user()->chefe == 'Sim' || Auth::user()->patente == 'Coronel' || Auth::user()->patente == 'Major' || Auth::user()->patente == 'Capitão')
                        <a id="dropdown" class="dropdown-item" href="{{route('index')}}">Permutas</a>
                        @endif
                        @if(Auth::user()->setorAtuacao == 'SPO' || Auth::user()->chefedoSetor == 'SPO' || Auth::user()->patente == 'Coronel' || Auth::user()->patente == 'Major' || Auth::user()->patente == 'Capitão')
                        <a id="dropdown" class="dropdown-item" href="{{route('policial.index')}}">Policial</a>
                        @endif
                        <a id="dropdown" class="dropdown-item" href="{{route('suspeitos.index')}}">Suspeito</a>
                        <a id="dropdown" class="dropdown-item" href="{{route('permutas.index')}}">Permutas Solicitadas</a>
                        <a id="dropdown" class="dropdown-item" href="{{route('dispensa.index')}}">Dispensa Solicitadas</a>
                        <a id="dropdown" class="dropdown-item" href="{{route('abono.index')}}">Abono Solicitados</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="caret">{{(Auth::user()->nome)}}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a id="dropdown" class="dropdown-item" href="{{route('policial.edit', Auth::User()->id)}}">Editar Perfil</a>

                        <a id="dropdown" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @hasSection('body')
    @yield('body')
    @endif
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
</body>

</html>