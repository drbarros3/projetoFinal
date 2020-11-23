<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PFC-PM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
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
            <div  class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('inicio.create')}}">Início <span class="sr-only">(current)</span></a>
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
                            <a id="dropdown" class="dropdown-item" href="{{route('suspeitos.index')}}">Suspeito</a>
                            <a id="dropdown" class="dropdown-item" href="{{route('permutas.index')}}">Permutas Solicitadas</a>
                            <a id="dropdown" class="dropdown-item" href="{{route('index')}}">Permutas Aceitas</a>
                        </div>
                    </li>         
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{Auth::User()->nome}} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a id="dropdown" class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
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
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>  
</body>
</html>