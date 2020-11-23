<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="text-center">
    <div style="position: relative; top: 50px; " >
        <div class="">
            <p style="margin: 0px auto"><b>POLÍCIA MILITAR DA BAHIA</b></p>
            <p style="margin: 0px auto"><b>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</b></p>
            <p style="margin: 0px auto"><b>COMANDO DE POLICIAMENTO REGIONAL LESTE</b></p>
            <p><b>65º COMPANHIA INDEPENDENTE DE POLÍCIA MILITAR</b></p>
        </div>
        <div>
            <p><b>FORMULÁRIO DE ABONO DE SERVIÇO.</b></p>
        </div>
        <div>
            <p style="margin: 0px auto">Eu, {{$abono->nome}}, MAT: {{$abono->num_mat}}</p>
            <p style="margin: 0px auto">solicito a V.S.ª autorização para abonar o serviço, no qual estou escalado conforme</p>
            <p style="margin: 0px auto">informações abaixo:</p>
            <p>SUBSTITUTO: {{$abono->substituto}}, Matricula: {{$abono->mat_sub}}</p>
        </div>
        <div class="tabelaAbono">
            <ul class=" row ">
                <li class="list-group-item col-md-1">SERVIÇO</li>
                <li class="list-group-item col-md-3">{{$abono->servico}}</li>
                <li class="list-group-item col-md-1">FUNÇÃO</li>
                <li class="list-group-item col-md-2">{{$abono->funcao}}</li>
            </ul>
            <ul class=" row ">
                <li class="list-group-item col-md-1">DATA</li>
                <li class="list-group-item col-md-3">{{date('d/m/Y', strtotime($abono->data))}}</li>
                <li class="list-group-item col-md-1">HORÁRIO</li>
                <li class="list-group-item col-md-2">Dàs {{$abono->das}}, Às {{$abono->as}}</li>
            </ul>
            <ul class=" row ">
                <li class="list-group-item col-md-1 px-2">ASSINATURA</li>
                <li class="list-group-item col-md-6"></li>
            </ul>
        </div>
        <div class="text-center">
            <p style="margin: 0px auto">Após assinarmos, estamos cientes que a o Comandante não é responsável por</p>
            <p style="margin: 0px auto">gerenciar qualquer situação em que haja conflito ou divergência daquilo que foi acordado</p>
            <p style="margin: 0px auto">entre as partes.</p>
        </div>

        <div class="text-center">
            <p style="display: none">{{setlocale(LC_ALL, 'pt_BR')}}</p>
            <p>Em {{ date('d', strtotime($abono->dataConfirmacao))}} de {{ ucfirst(strftime('%B', strtotime($abono->dataConfirmacao)))}} de {{date('Y', strtotime($abono->dataConfirmacao))}} </p>
        </div>
        <div class="text-center" style="position: relative; top: 30px">
            <p style="margin: 0px auto">____________________________________________________________________________</p>
            <p>Solicitante</p>
        </div>
        <div class="text-center" style="position: relative; top: 30px">
            <p style="margin: 20px auto">AUTORIZADO</p>
            <p style="position: relative; top: -20px">{{ date('d/m/Y', strtotime($abono->dataConfirmacaoCMD))}}</p>
                <p style="margin: -10px auto"><b>{{$abono->assinaturaCMD}}</b></p>
            <p style="margin: 0px auto">________________________________</p>
            <p>CMT DO PELOTÃO</p>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>