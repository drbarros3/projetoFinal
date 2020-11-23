<?php
    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

    $dataSPO = date('d/m/Y', strtotime($dispensa->dataSPO));
    $dia_do_servico = date('d/m/Y', strtotime($dispensa->dia_do_servico));

    $pagina_1 = "<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='utf-8'>
            <title>Dispença</title>
            <link href='css/personalizado.css' rel='stylesheet'>
            <link rel='stylesheet' type='text/css' href='css/styles.css'>
        </head>

        <div class='text-center pt-5'>
    <div class=
    'headDispensa' style='position: relative; text-align: center'>
        <p style='margin: 3px'><b>POLÍCIA MILITAR DA BAHIA</b></p>
        <p style='margin: 3px'><b>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</b></p>
        <p style='margin: 3px'><b>COMANDO DE POLICIAMENTO REGIONAL LESTE</b></p>
        <p style='margin: 3px'><b>65º COMPAINHA INDEPENDENTE DE POLÍCIA MILITAR</b></p>
        <p style='margin: 3px'><b>SEÇÃO DE PLANEJAMENTO OPERACIONAL</b></p>
    </div>
    <div style='position: relative; top: -20px'>
        <div id='spo' style='left: 250px'>
            <p id='via' style='top: -50px'>VIA DA SPO</p>
            <p id='spo'>AUTORIZO <br> EM $dataSPO
                <p style='position: relative; top: -40px'> {$dispensa->assinaturaSPO}</p>
                <p style='position: relative; top: -70px'>_______________</p> <br>
                <p style='position: relative; top: -120px'> Chefe da SPO</P>
        </div>
        <div class='cmd' style='position: relative; left: 55%; top: -90px' >
                <p>COMANDANTE DO PELOTÃO <br> 
                <p style='position: relative; top: 40px'>OPINO POR: DEFERIMENTO (  )</p> 
                <p style='position: relative; top: 65px'>INDEFERIMENTO ( )</p>
                <p style='position: relative; top: 100px'></p>
                <p style='position: relative; top: 105px'> _____________________</p>
                <p style='position: relative; top: 125px'>CMD PEL</p>
        </div>
    </div>
</div>
<div style='position: absolute; text-align: center; top: 280px; font-size: 13pt; margin-left: 24%; margin-right: 24%; word-wrap: break-word;'>
    <h1 style='position: relative; top: 20px'>S  O  L  I  C  I  T  A  Ç  Ã  O</h1>
    <h2 style='position: relative; top: 0px'>Dispensa de serviço ordinário</h2>
    <p style='margin: 3px'>Eu, {$dispensa->Solicitante},</p>
    <p style='margin: 3px'>Mat. {$dispensa->Matricula}, integrante do {$dispensa->Pelotao}º Pelotão desta CIPM,</p>
    <p style='margin: 3px'>Solicito a V.Sª. dispensa do serviço para o qual estou devidamente escalado</p>
    <p style='margin: 3px'>no(a) {$dispensa->escalado}, no(s) dia(s) {$dia_do_servico}</p>
    <p style='margin: 3px'>das {$dispensa->hora_inicial} às {$dispensa->hora_final}, em virtude de</p>
    <p style='margin: 3px'>{$dispensa->virtude}</p>
    <p style='position: relative; top: 15px'>Feira de Santana, ____de________________de________.</p>
    <p style='position: relative; top: 30px'>{$dispensa->Solicitante}</p>
    <p style='margin: 3px'>______________________________________</p>
    <p style='margin: 3px'>Solicitante</p>
</div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/'></script>
    <script type='text/javascript' src='js/app.js'></script>  
    <script type='text/javascript' src='js/script.js'></script>
    </html>";


    $pagina_2 = "<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='utf-8'>
            <title>Dispença</title>
            <link href='css/personalizado.css' rel='stylesheet'>
            <link rel='stylesheet' type='text/css' href='css/styles.css'>
        </head>

        <div class='text-center pt-5'>
    <div class=
    'headDispensa' style='position: relative; text-align: center'>
        <p style='margin: 3px'><b>POLÍCIA MILITAR DA BAHIA</b></p>
        <p style='margin: 3px'><b>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</b></p>
        <p style='margin: 3px'><b>COMANDO DE POLICIAMENTO REGIONAL LESTE</b></p>
        <p style='margin: 3px'><b>65º COMPAINHA INDEPENDENTE DE POLÍCIA MILITAR</b></p>
        <p style='margin: 3px'><b>SEÇÃO DE PLANEJAMENTO OPERACIONAL</b></p>
    </div>
    <div style='position: relative; top: -20px'>
        <div id='spo' style='left: 250px'>
            <p id='via' style='top: -50px'>VIA DA SPO</p>
            <p id='spo'>AUTORIZO <br> EM $dataSPO
                <p style='position: relative; top: -40px'> {$dispensa->assinaturaSPO}</p>
                <p style='position: relative; top: -70px'>_______________</p> <br>
                <p style='position: relative; top: -120px'> Chefe da SPO</P>
        </div>
        <div class='cmd' style='position: relative; left: 55%; top: -90px' >
                <p>COMANDANTE DO PELOTÃO <br> 
                <p style='position: relative; top: 40px'>OPINO POR: DEFERIMENTO ( X )</p> 
                <p style='position: relative; top: 65px'>INDEFERIMENTO ( )</p>
                <p style='position: relative; top: 100px'>{$dispensa->assinaturaCMD}</p>
                <p style='position: relative; top: 105px'> _____________________</p>
                <p style='position: relative; top: 125px'>CMD PEL</p>
        </div>
    </div>
</div>
<div style='position: absolute; text-align: center; top: 280px; font-size: 13pt; margin-left: 24%; margin-right: 24%; word-wrap: break-word;'>
    <h1 style='position: relative; top: 20px'>S  O  L  I  C  I  T  A  Ç  Ã  O</h1>
    <h2 style='position: relative; top: 0px'>Dispensa de serviço ordinário</h2>
    <p style='margin: 3px'>Eu, {$dispensa->Solicitante},</p>
    <p style='margin: 3px'>Mat. {$dispensa->Matricula}, integrante do {$dispensa->Pelotao}º Pelotão desta CIPM,</p>
    <p style='margin: 3px'>Solicito a V.Sª. dispensa do serviço para o qual estou devidamente escalado</p>
    <p style='margin: 3px'>no(a) {$dispensa->escalado}, no(s) dia(s) {$dia_do_servico}</p>
    <p style='margin: 3px'>das {$dispensa->hora_inicial} às {$dispensa->hora_final}, em virtude de</p>
    <p style='margin: 3px'>{$dispensa->virtude}</p>
    <p style='position: relative; top: 15px'>Feira de Santana, ____de________________de________.</p>
    <p style='position: relative; top: 30px'>{$dispensa->Solicitante}</p>
    <p style='margin: 3px'>______________________________________</p>
    <p style='margin: 3px'>Solicitante</p>
</div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/'></script>
    <script type='text/javascript' src='js/app.js'></script>  
    <script type='text/javascript' src='js/script.js'></script>
    </html>";



    $pagina_3 = "<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='utf-8'>
            <title>Dispença</title>
            <link href='css/personalizado.css' rel='stylesheet'>
            <link rel='stylesheet' type='text/css' href='css/styles.css'>
        </head>

        <div class='text-center pt-5'>
    <div class=
    'headDispensa' style='position: relative; text-align: center'>
        <p style='margin: 3px'><b>POLÍCIA MILITAR DA BAHIA</b></p>
        <p style='margin: 3px'><b>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</b></p>
        <p style='margin: 3px'><b>COMANDO DE POLICIAMENTO REGIONAL LESTE</b></p>
        <p style='margin: 3px'><b>65º COMPAINHA INDEPENDENTE DE POLÍCIA MILITAR</b></p>
        <p style='margin: 3px'><b>SEÇÃO DE PLANEJAMENTO OPERACIONAL</b></p>
    </div>
    <div style='position: relative; top: -20px'>
        <div id='spo' style='left: 250px'>
            <p id='via' style='top: -50px'>VIA DA SPO</p>
            <p id='spo'>AUTORIZO <br> EM $dataSPO
                <p style='position: relative; top: -40px'> {$dispensa->assinaturaSPO}</p>
                <p style='position: relative; top: -70px'>_______________</p> <br>
                <p style='position: relative; top: -120px'> Chefe da SPO</P>
        </div>
        <div class='cmd' style='position: relative; left: 55%; top: -90px' >
                <p>COMANDANTE DO PELOTÃO <br> 
                <p style='position: relative; top: 40px'>OPINO POR: DEFERIMENTO (  )</p> 
                <p style='position: relative; top: 65px'>INDEFERIMENTO ( x )</p>
                <p style='position: relative; top: 100px'>{$dispensa->assinaturaCMD}</p>
                <p style='position: relative; top: 105px'> _____________________</p>
                <p style='position: relative; top: 125px'>CMD PEL</p>
        </div>
    </div>
</div>
<div style='position: absolute; text-align: center; top: 280px; font-size: 13pt; margin-left: 24%; margin-right: 24%; word-wrap: break-word;'>
    <h1 style='position: relative; top: 20px'>S  O  L  I  C  I  T  A  Ç  Ã  O</h1>
    <h2 style='position: relative; top: 0px'>Dispensa de serviço ordinário</h2>
    <p style='margin: 3px'>Eu, {$dispensa->Solicitante},</p>
    <p style='margin: 3px'>Mat. {$dispensa->Matricula}, integrante do {$dispensa->Pelotao}º Pelotão desta CIPM,</p>
    <p style='margin: 3px'>Solicito a V.Sª. dispensa do serviço para o qual estou devidamente escalado</p>
    <p style='margin: 3px'>no(a) {$dispensa->escalado}, no(s) dia(s) {$dia_do_servico}</p>
    <p style='margin: 3px'>das {$dispensa->hora_inicial} às {$dispensa->hora_final}, em virtude de</p>
    <p style='margin: 3px'>{$dispensa->virtude}</p>
    <p style='position: relative; top: 15px'>Feira de Santana, ____de________________de________.</p>
    <p style='position: relative; top: 30px'>{$dispensa->Solicitante}</p>
    <p style='margin: 3px'>______________________________________</p>
    <p style='margin: 3px'>Solicitante</p>
</div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/'></script>
    <script type='text/javascript' src='js/app.js'></script>  
    <script type='text/javascript' src='js/script.js'></script>
    </html>";

    if($dispensa->assinaturaCMD == ''){
        $dompdf->load_html($pagina_1);
    }
    if($dispensa->optCMD == 'Deferimento'){
        $dompdf->load_html($pagina_2);
    }
    if($dispensa->optCMD == 'Indeferimento'){
        $dompdf->load_html($pagina_3);
    }

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $dompdf->stream(
        "Dispensa.pdf",
        array(
            "Attachment" => false
        )
    )
?>