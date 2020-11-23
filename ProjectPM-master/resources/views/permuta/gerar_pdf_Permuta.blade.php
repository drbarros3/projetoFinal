<?php	
	//referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

	//Criando a Instancia
    $dompdf = new Dompdf();
    
    
	setlocale(LC_ALL, 'pt_BR');
	$dataSPO = date('d/m/Y', strtotime($permuta->dataSPO));
    $dia_do_servico = date('d/m/Y', strtotime($permuta->escaladoDia_do_servico));
    $dataConfirmacao = date('d/m/Y', strtotime($permuta->dataConfirmacao));

    $pagina = "
    <!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='utf-8'>
            <title>Permuta</title>
            <link href='css/personalizado.css' rel='stylesheet'>
            <link rel='stylesheet' type='text/css' href='css/styles.css'>
        </head>
    <div id='spo' style='left: 50px'>
    <p id='via' style='position: relative; top: -60px' >VIA DA SPO</p>
        <p style='position: relative; top: -60px'>AUTORIZO EM {$dataSPO}</p>
        <p style='position: relative; top: -60px'> {$permuta->assinaturaSPO}</p> 
        <p style='position: relative; top: -90px'>_______________</p> <br >  <p style='position: relative; top: -130px'> Chefe da SPO</P>
        
    </div>
    <div style='position:relative; top:-87px; left :750px' class='cmd'>
            <p>COMANDANTE DO PELOTÃO </p>
            <p style='position: relative; top: 40px'>OPINO POR: DEFERIMENTO ( X )</p> 
            <p style='position: relative; top: 60px'> INDEFERIMENTO (  )</p> 
            <p style='position: relative; top: 85px'>{$permuta->assinaturaCMD}</p>
            <p style='position: relative; top: 96px'> _____________________</p>
            <p style='position: relative; top: 125px'>CMD PEL</p>
    </div>
    <p style='position: relative; text-align:center;  top:-250px'>POLÍCIA MILITAR DA BAHIA <br> COMANDO DE POLICIAMENTO REGIONAL LESTE <br> 65ª CIPM - FEIRA DE SANTANA</p>
        <h1 id='tpermuta' style='position: relative; top: -220px'><b>PERMUTA</b></h1>
    <div style='position: absolute; top: 200px; text-align: center; font-size: 13pt'>
        <p >Eu, {$permuta->nome}, Mat.:{$permuta->matricula} solicito a V.Sª permuta do serviço </p>
        <p >para o qual estou devidamente escalado no {$permuta->local} no dia {$dia_do_servico} das {$permuta->hora_inicial} às {$permuta->hora_final}</p>
        <p >com o, $permuta->escalado, Mat.:{$permuta->escaladoMatricula} que se encontra escalado no        {$permuta->escaladoLocal}</p>
        <p>no dia {$dia_do_servico}, das {$permuta->escaladoHora_inicial} às {$permuta->escaladoHora_final}, tendo em vista {$permuta->virtude}</p>
        <p><b>Declaro que a referida permuta está em conformidade com o preceituado no Art. 2º § 2º, Portaria N° 067 - CG/11.</b></p>
        <p>Feira de Santana, {$dataConfirmacao}</p>
        <p style='position: relative; left:-250px; top: 10px'>{$permuta->nome}</p>
        <p style='position: relative; left: 280px; top: -25px'>{$permuta->escalado}</p>
        <p style='position: relative; left:-250px; top: -45px'>__________________________________</p>
        <p style='position: relative; left: -260px; top: -50px'>Solicitante</p>        
        <p style='position: absolute; right:100px; top: 250px'>__________________________________</p>
        <p style='position: relative; left:280px; top: -100px'>Substituto</p>     
    </div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/'></script>
    <script type='text/javascript' src='js/app.js'></script>  
    <script type='text/javascript' src='js/script.js'></script>
    </html>";

    $pagina2 = "<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='utf-8'>
            <title>Permuta</title>
            <link href='css/personalizado.css' rel='stylesheet'>
            <link rel='stylesheet' type='text/css' href='css/styles.css'>
        </head>
    <div id='spo' style='left: 50px'>
    <p id='via' style='position: relative; top: -60px' >VIA DA SPO</p>
        <p style='position: relative; top: -60px'>AUTORIZO EM {$dataSPO}</p>
        <p style='position: relative; top: -60px'> {$permuta->assinaturaSPO}</p> 
        <p style='position: relative; top: -90px'>_______________</p> <br >  <p style='position: relative; top: -130px'> Chefe da SPO</P>
        
    </div>
    <div style='position:relative; top:-87px; left :750px' class='cmd'>
            <p>COMANDANTE DO PELOTÃO </p>
            <p style='position: relative; top: 40px'>OPINO POR: DEFERIMENTO (  )</p> 
            <p style='position: relative; top: 60px'> INDEFERIMENTO ( X )</p> 
            <p style='position: relative; top: 85px'>{$permuta->assinaturaCMD}</p>
            <p style='position: relative; top: 96px'> _____________________</p>
            <p style='position: relative; top: 125px'>CMD PEL</p>
    </div>
    <p style='position: relative; text-align:center;  top:-250px'>POLÍCIA MILITAR DA BAHIA <br> COMANDO DE POLICIAMENTO REGIONAL LESTE <br> 65ª CIPM - FEIRA DE SANTANA</p>
        <h1 id='tpermuta' style='position: relative; top: -220px'><b>PERMUTA</b></h1>
    <div style='position: absolute; top: 200px; text-align: center; font-size: 13pt'>
        <p >Eu, {$permuta->nome}, Mat.:{$permuta->matricula} solicito a V.Sª permuta do serviço </p>
        <p >para o qual estou devidamente escalado no {$permuta->local} no dia {$dia_do_servico} das {$permuta->hora_inicial} às {$permuta->hora_final}</p>
        <p >com o, $permuta->escalado, Mat.:{$permuta->escaladoMatricula} que se encontra escalado no        {$permuta->escaladoLocal}</p>
        <p>no dia {$dia_do_servico}, das {$permuta->escaladoHora_inicial} às {$permuta->escaladoHora_final}, tendo em vista {$permuta->virtude}</p>
        <p><b>Declaro que a referida permuta está em conformidade com o preceituado no Art. 2º § 2º, Portaria N° 067 - CG/11.</b></p>
        <p>Feira de Santana, {$dataConfirmacao}</p>
        <p style='position: relative; left:-250px; top: 10px'>{$permuta->nome}</p>
        <p style='position: relative; left: 280px; top: -25px'>{$permuta->escalado}</p>
        <p style='position: relative; left:-250px; top: -45px'>__________________________________</p>
        <p style='position: relative; left: -260px; top: -50px'>Solicitante</p>        
        <p style='position: absolute; right:100px; top: 250px'>__________________________________</p>
        <p style='position: relative; left:280px; top: -100px'>Substituto</p>     
    </div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/'></script>
    <script type='text/javascript' src='js/app.js'></script>  
    <script type='text/javascript' src='js/script.js'></script>
    </html>";

    $pagina3 = "<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='utf-8'>
            <title>Permuta</title>
            <link href='css/personalizado.css' rel='stylesheet'>
            <link rel='stylesheet' type='text/css' href='css/styles.css'>
        </head>
        <div id='spo' style='left: 50px'>
        <p id='via' style='position: relative; top: -60px' >VIA DA SPO</p>
            <p style='position: relative; top: -60px'>AUTORIZO EM {$dataSPO}</p>
            <p style='position: relative; top: -60px'> {$permuta->assinaturaSPO}</p> 
            <p style='position: relative; top: -90px'>_______________</p> <br >  <p style='position: relative; top: -130px'> Chefe da SPO</P>
            
        </div>
    <div style='position:relative; top:-87px; left :750px' class='cmd'>
            <p>COMANDANTE DO PELOTÃO </p>
            <p style='position: relative; top: 40px'>OPINO POR: DEFERIMENTO (  )</p> 
            <p style='position: relative; top: 60px'> INDEFERIMENTO (  )</p> 
            <p style='position: relative; top: 85px'></p>
            <p style='position: relative; top: 96px'> _____________________</p>
            <p style='position: relative; top: 125px'>CMD PEL</p>
    </div>
    <p style='position: relative; text-align:center;  top:-250px'>POLÍCIA MILITAR DA BAHIA <br> COMANDO DE POLICIAMENTO REGIONAL LESTE <br> 65ª CIPM - FEIRA DE SANTANA</p>
        <h1 id='tpermuta' style='position: relative; top: -220px'><b>PERMUTA</b></h1>
    <div style='position: absolute; top: 200px; text-align: center; font-size: 13pt'>
        <p >Eu, {$permuta->nome}, Mat.:{$permuta->matricula} solicito a V.Sª permuta do serviço </p>
        <p >para o qual estou devidamente escalado no {$permuta->local} no dia {$dia_do_servico} das {$permuta->hora_inicial} às {$permuta->hora_final}</p>
        <p >com o, $permuta->escalado, Mat.:{$permuta->escaladoMatricula} que se encontra escalado no        {$permuta->escaladoLocal}</p>
        <p>no dia {$dia_do_servico}, das {$permuta->escaladoHora_inicial} às {$permuta->escaladoHora_final}, tendo em vista {$permuta->virtude}</p>
        <p><b>Declaro que a referida permuta está em conformidade com o preceituado no Art. 2º § 2º, Portaria N° 067 - CG/11.</b></p>
        <p>Feira de Santana, {$dataConfirmacao}</p>
        <p style='position: relative; left:-250px; top: 10px'>{$permuta->nome}</p>
        <p style='position: relative; left: 280px; top: -25px'>{$permuta->escalado}</p>
        <p style='position: relative; left:-250px; top: -45px'>__________________________________</p>
        <p style='position: relative; left: -260px; top: -50px'>Solicitante</p>        
        <p style='position: absolute; right:100px; top: 250px'>__________________________________</p>
        <p style='position: relative; left:280px; top: -100px'>Substituto</p>     
    </div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/'></script>
    <script type='text/javascript' src='js/app.js'></script>  
    <script type='text/javascript' src='js/script.js'></script>
    </html>";

	// Carrega seu HTML
    if($permuta->optCMD == 'Deferimento')
    {
        $dompdf->load_html($pagina);
    }
    if($permuta->optCMD == 'Indeferimento'){
        $dompdf->load_html($pagina2);
    }
    if($permuta->assinaturaCMD == ''){
        $dompdf->load_html($pagina3);
    }

	
	$dompdf->setPaper('A4', 'landscape');
	
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"permuta.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	)
?>