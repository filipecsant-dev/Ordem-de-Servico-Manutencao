<?php	

	ob_start(); session_start();
	require '../funcoes/banco/conexao.php';
	require '../funcoes/login/login.php';

	logado();

	$id = $_GET['id'];

	function editprod($id){
	$db = $_SESSION['logado']->empresa;
	$pdo = conectar($db);

	try{
		$editprod = $pdo->prepare("SELECT * FROM dbos WHERE id = ?");
		$editprod->bindValue(1,$id,PDO::PARAM_INT);
		$editprod->execute();

		if($editprod->rowCount() > 0):
			return $editprod->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}




	use Dompdf\Dompdf;

	require_once("../dompdf/autoload.inc.php");

	$dompdf = new DOMPDF();

	$dompdf->set_paper('A4');

		$editprod = editprod($id);
		foreach($editprod as $visu) {

			if($visu->prioridade === null || $visu->prioridade === ''){$visu->prioridade = 'Urgente';}
			if($visu->pecasubstituida === null || $visu->pecasubstituida === ''){$visu->pecasubstituida = '-';}
			if($visu->codigo === null || $visu->codigo === ''){$visu->codigo = '-';}
			if($visu->status === 'Aberta'){$datafinal = '-'; $visu->manutentor = '-'; $visu->manutentor2 = '-'; $visu->horainicial = '-'; $visu->horafinal = '-'; $visu->servico = '-';} else {$datafinal = date('d/m/Y', strtotime($visu->datafinal));}
			if($visu->status != 'Fechada'){$visu->assinatura = '-';}
			if($visu->manutentor2 === null || $visu->manutentor2 === '' || $visu->manutentor2 === $visu->manutentor){$visu->manutentor2 = '-';}else { if($visu->horainicial2 === null || $visu->horainicial2 === ''){$visu->horainicial2 = $visu->horainicial;} if($visu->horafinal2 === null || $visu->horafinal2 === ''){$visu->horafinal2 = $visu->horafinal;} }

	$html = '

	<title>OS: '.$id.'</title>


	<table style="height: 376px; width: 624px; border-color: #000000;" border="1">
<tbody>
<tr style="height: 23px;">
<td style="width: 190.568px; height: 104px;" rowspan="6"><center><img src="../img/norpack.png" width="120" height="60"/></center></td>
<td style="width: 194.205px; height: 23px;">
<h3 style="text-align: center;"><strong>Solicita&ccedil;&atilde;o de Servi&ccedil;o</strong></h3>
</td>
<td style="width: 217.841px; height: 23px;">SS: '.$id.'</td>
</tr>
<tr style="height: 21px;">
<td style="width: 194.205px; height: 21px;">Solicitante: '.$visu->solicitante.'</td>
<td style="width: 217.841px; height: 21px;">Data: '.date('d/m/Y', strtotime($visu->data)).'</td>
</tr>
<tr style="height: 21px;">
<td style="width: 194.205px; height: 21px;">Fun&ccedil;&atilde;o: '.$visu->funcao.'</td>
<td style="width: 217.841px; height: 21px;">Hor&aacute;rio: '.$visu->hora.'</td>
</tr>
<tr style="height: 13px;">
<td style="width: 194.205px; height: 13px;">M&aacute;quina: '.$visu->maquina.'</td>
<td style="width: 217.841px; height: 13px;">&Aacute;rea: '.$visu->setormaq.'</td>
</tr>
<tr style="height: 13px;">
<td style="width: 194.205px; height: 13px;">Setor da Manut.: '.$visu->setormanu.'</td>
<td style="width: 217.841px; height: 13px;">Prioridade: '.$visu->prioridade.'</td>
</tr>

<tr style="height: 13px;">
<td style="width: 194.205px; height: 13px;" colspan="2">Conjunto: '.$visu->codigo.'</td>
</tr>
<tr style="height: 40.3579px;">
<td style="width: 614.205px; height: 40.3579px; text-align: center;" colspan="3"><strong>Falha Apresentada:</strong></td>
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3">'.$visu->falha.'</td>
</tr>
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><strong>Servi&ccedil;o Executado:</strong></td>
</tr>
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3">'.$visu->servico.'<br /><br /></td>
</tr>
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><strong>Materiais Utilizados:</strong></td>
</tr>
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><br />'.$visu->pecasubstituida.'<br /><br /></td>
</tr>
';

if($visu->observacao != NULL){

$html .='
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><strong>Observação:</strong></td>
</tr>
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><br />'.$visu->observacao.'<br /><br /></td>
</tr>

';
}

if($visu->aguardparada == 1){

$html .='
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><strong>Observação da Manutenção:</strong></td>
</tr>
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><br />Aguardando a parada da máquina para realizar este serviço.<br /><br /></td>
</tr>

';
}

$html .='
<tr style="height: 13px;">
<td style="width: 614.205px; height: 13px;" colspan="3">M&aacute;quina Parada?: '.$visu->maquinaparada.'</td>
</tr>
<tr style="height: 13px;">
<td style="width: 190.568px; height: 13px;">Manutentor: '.$visu->manutentor.'</td>
<td style="width: 194.205px; height: 13px;">Hora inicial: '.$visu->horainicial.'</td>
<td style="width: 217.841px; height: 13px;">Hora Final: '.$visu->horafinal.'</td>
</tr>
';
if($visu->manutentor2 != '-'){
$html .='
<tr style="height: 13px;">
<td style="width: 190.568px; height: 13px;">Manutentor Auxiliar: '.$visu->manutentor2.'</td>
<td style="width: 194.205px; height: 13px;">Hora inicial: '.$visu->horainicial2.'</td>
<td style="width: 217.841px; height: 13px;">Hora Final: '.$visu->horafinal2.'</td>
</tr>
';
}
$html .='
<tr style="height: 13px;">
<td style="width: 190.568px; height: 13px;">Data do Serviço: '.$datafinal.'</td>
<td style="width: 194.205px; height: 13px;">Recebido por: '.$visu->assinatura.'</td>
<td style="width: 217.841px; height: 13px;">Status SS: Fechada</td>
</tr>
</tbody>
</table>

		
';

		}
		


	$dompdf->load_html($html);

	$dompdf->render();



	$dompdf->stream(
		"historico.pdf", 
		array(
			"Attachment" => false //Fazer download
		)
	);
?>