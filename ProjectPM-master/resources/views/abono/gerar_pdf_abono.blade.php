<?php	
	//referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

	//Criando a Instancia
	$dompdf = new Dompdf();
	setlocale(LC_ALL, 'pt_BR');
	$dia = date('d', strtotime($abono->dataConfirmacao));
	$mes =  ucfirst(strftime('%B', strtotime($abono->dataConfirmacao)));
	$ano = date('Y', strtotime($abono->dataConfirmacao));
	$dataConfirmacaoCMD = date('d/m/Y', strtotime($abono->dataConfirmacaoCMD));
	$dataAbono = date('d/m/Y', strtotime($abono->data));

	$pagina = "
	<!DOCTYPE html>
	<html lang='pt-br'>
	<head>
		<meta charset='utf-8'>
		<title>Abono</title>
		<link href='css/personalizado.css' rel='stylesheet'>
		<link rel='stylesheet' type='text/css' href='css/styles.css'>
	</head>
	<body>
	<div class='text-center'>
		<div style='position: relative; top: 20px; ' >
			<div style='position: relative; left: 30%;'>
				<p style='position: relative; top: -30px; margin: 0px auto'><b>POLÍCIA MILITAR DA BAHIA</b></p>
				<p style='position: relative; top: -10px; margin: 0px auto'><b>COMANDO DE OPERAÇÕES POLICIAIS MILITARES</b></p>
				<p style='position: relative; top: 10px; margin: 0px auto'><b>COMANDO DE POLICIAMENTO REGIONAL LESTE</b></p>
				<p style='position: relative; top: 30px;'><b>65º COMPANHIA INDEPENDENTE DE POLÍCIA MILITAR</b></p>
			</div>
			<div>
				<p style='position: relative; top: 20px; left: 35%'><b>FORMULÁRIO DE ABONO DE SERVIÇO.</b></p>
			</div>
			<div style='position: relative; left: 20%; top: 40px'>
				<p style='position: relative; top: 10px; margin: 0px auto; '>Eu, $abono->nome, MAT: $abono->num_mat</p>
				<p style='position: relative; top: 28px; margin: 0px auto'>solicito a V.S.ª autorização para abonar o serviço, no qual estou escalado conforme</p>
				<p style='position: relative; top: 45px; margin: 0px auto'>informações abaixo:</p>
				<p style='position: relative; top: 70px;'>SUBSTITUTO: $abono->substituto, Matricula: $abono->mat_sub</p>
			</div>
			<div style='position: relative; top: 70px; left: 20%'>
			<table class='table table-bordered'>
			<thead>
			  <tr>
				<th scope='col-1'>SERVIÇO</th>
				<td scope='col'>$abono->servico</td>
				<th scope='col-2'>FUNÇÃO</th>
				<td scope='col'>$abono->funcao</td>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<th scope='row'>DATA</th>
				<td>$dataAbono</td>
				<th>HORÁRIO</th>
				<td>Dàs $abono->das, Às $abono->as</td>
			  </tr>
			  <tr>
				<th scope='row'>ASSINATURA</th>
				<td colspan='3'></td>
			  </tr>
			</tbody>
		  </table>
			</div>
			<div style='position: relative; left: 20%'>
				<p style='position: relative; top: 70px; margin: 0px auto'>Após assinarmos, estamos cientes que a o Comandante não é responsável por</p>
				<p style='position: relative; top: 88px; margin: 0px auto'>gerenciar qualquer situação em que haja conflito ou divergência daquilo que foi acordado</p>
				<p style='position: relative; top: 105px; margin: 0px auto'>entre as partes.</p>
			</div>
	
			<div style='position: relative; top: 120px; left: 40%'>
				<p style='display: none'></p>
				<p>Em  $dia de $mes de $ano </p>
			</div>
			<div style='position: relative; top: 30px; left: 20%'>
				<p style='position: relative; top: 100px; margin: 0px auto'>____________________________________________________________________________</p>
				<p style='position: relative; left:25%; top: 120px; margin: 0px auto'>Solicitante</p>
			</div>
			<div style='position: relative; top: 60px; left: 43%'>
				<p style='position: relative; top: 110px; margin: 20px auto'>AUTORIZADO</p>
				<p style='position: relative; top: 140px'>EM $dataConfirmacaoCMD </p>
					<p style='position: relative; top: 150px; margin: -10px auto; left: -20px'><b>$abono->assinaturaCMD</b></p>
				<p style='position: relative; top: 160px; left: -70px; margin: 0px auto'>________________________________</p>
				<p  style='position: relative; top: 180px; left: -20px;'>CMT DO PELOTÃO</p>
			</div>
		</div>
	</div>
	<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
	<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
	</body>
	</html>
	";

	// Carrega seu HTML
	{
    
        $dompdf->load_html($pagina);
    }

	
	$dompdf->setPaper('A4', 'landscape');
	
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"Abono.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	)
