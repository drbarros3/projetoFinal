<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <title>Login</title>
</head>
<body>
    <div id="divexterna">
        <img id="img" src="/imgs/PMBA.png" width="100" height="100" alt="">
        <h1>Login</h1>
        @if(session('msg'))
            <div class="alert alert-danger">{{session('msg')}}</div>
        @endif
        <form action="{{route('login')}}" method="post"> 
            {{csrf_field()}}
            <div class="{{ $errors->has('matricula') ? 'has->error' : '' }}">   
                <label id= "label" for="matricula">Nº da matrícula</label>
                <input name="matricula" id="matricula" class="form-control" size=20 >
                @if($errors->has('matricula'))
                    <span style="color: red" class="help-block">
                        {{ $errors->first('matricula') }}
                    </span>
                @endif
            </div>
            <div class=" {{ $errors->has('password') ? 'has-error' : '' }} " >
                <label id= "label" for="password">Senha</label>
                <input  type="password" name="password" id="password" class="form-control" size=20 > 
                @if( $errors->has('password') )
                    <span style="color: red" class=" help-block " >
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            <a href="/cadastro">Cadastrar</a>
            <div>
                <button id="btn" type="submit" class="btn btn-primary" >Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>