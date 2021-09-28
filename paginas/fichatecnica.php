<?php	

	ob_start(); session_start();
	require '../funcoes/banco/conexao.php';
	require '../funcoes/login/login.php';

	logado();

	$id = $_GET['id'];
	$maquina = $_GET['maq'];

	function visu_ficha($id){
	$db = $_SESSION['logado']->empresa;
	$pdo = conectar($db);

		try{
			$editprod = $pdo->prepare("SELECT * FROM preventiva WHERE id = ?");
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


	function editprod2($id){
	$db = $_SESSION['logado']->empresa;
	$pdo = conectar($db);

		try{
			$editprod = $pdo->prepare("SELECT * FROM dbos WHERE notify = ? ORDER BY id DESC");
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

	if($maquina === "Extrusora 01"){
		$maq = "Extrusora";
		$cod = "01";
		$fab = "CARNEVALLI";
		$mod = "MICRO MASTER 440/420";
	} else if($maquina === "Extrusora 02"){
		$maq = "Extrusora";
		$cod = "02";
		$fab = "POWER MASTER CARNEVALLI";
		$mod = "AEG CARNEVALLI";
	} else if($maquina === "Extrusora 03"){
		$maq = "Extrusora";
		$cod = "03";
		$fab = "CARNEVALLI";
		$mod = "3PO 1200 / COEX";
	} else if($maquina === "Extrusora 04"){
		$maq = "Extrusora";
		$cod = "04";
		$fab = "CARNEVALLI";
		$mod = "3PO 1400 / COEX";
	} else if($maquina === "Extrusora 05"){
		$maq = "Extrusora";
		$cod = "05";
		$fab = "CARNEVALLI";
		$mod = "3PO 1800 / COEX";
	} else if($maquina === "Extrusora 06"){
		$maq = "Extrusora";
		$cod = "06";
		$fab = "CARNEVALLI";
		$mod = "3PO 1800 / COEX";
	} else if($maquina === "Extrusora 07"){
		$maq = "Extrusora";
		$cod = "07";
		$fab = "CARNEVALLI";
		$mod = "CLD 90 / MONO";
	} else if($maquina === "Extrusora 08"){
		$maq = "Extrusora";
		$cod = "08";
		$fab = "CARNEVALLI";
		$mod = "5 CAMADAS PLUS";
	} else if($maquina === "Extrusora 09"){
		$maq = "Extrusora";
		$cod = "09";
		$fab = "CARNEVALLI";
		$mod = "3PO 1800";
	} else if($maquina === "Extrusora 10"){
		$maq = "Extrusora";
		$cod = "10";
		$fab = "CARNEVALLI";
		$mod = "COEX POLARIS PLUS";
	} else if($maquina === "FP4"){
		$maq = "Impressora";
		$cod = "FP4";
		$fab = "FLEXO POWER";
		$mod = "Nº 113";
	} else if($maquina === "FT1"){
		$maq = "Impressora";
		$cod = "FT1";
		$fab = "FLEXO TECH";
		$mod = "PREMIUM / 1300";
	} else if($maquina === "FO1"){
		$maq = "Impressora";
		$cod = "FO1";
		$fab = "FLEXO ONE";
		$mod = "ORCHESTRA GEARLESS 8";
	} else if($maquina === "FO2"){
		$maq = "Impressora";
		$cod = "FO2";
		$fab = "FLEXO ONE";
		$mod = "ORCHESTRA GEARLESS 8";
	} else if($maquina === "FO3"){
		$maq = "Impressora";
		$cod = "FO3";
		$fab = "FLEXO ONE";
		$mod = "ORCHESTRA GEARLESS 8";
	} else if($maquina === "Rebobinadeira 01"){
		$maq = "Rebobinadeira";
		$cod = "01";
		$fab = "MEGASTEEL";
		$mod = "287";
	} else if($maquina === "Rebobinadeira 02"){
		$maq = "Rebobinadeira";
		$cod = "02";
		$fab = "PERMACO";
		$mod = "COMPAC";
	} else if($maquina === "Rebobinadeira 03"){
		$maq = "Rebobinadeira";
		$cod = "03";
		$fab = "PERMACO";
		$mod = "MINI SPEED MAX";
	} else if($maquina === "Rebobinadeira 04"){
		$maq = "Rebobinadeira";
		$cod = "04";
		$fab = "MEGASTEEL";
		$mod = "JAGUAR CLASSIC";
	} else if($maquina === "Rebobinadeira 05"){
		$maq = "Rebobinadeira";
		$cod = "05";
		$fab = "MEGASTEEL";
		$mod = "JAGUAR CLASSIC";
	} else if($maquina === "Rebobinadeira 06"){
		$maq = "Rebobinadeira";
		$cod = "06";
		$fab = "NEW PERMACO";
		$mod = "OPTIMA RSD 1400 Ø1000";
	} else if($maquina === "Corte e Solda 01"){
		$maq = "Corte e Solda";
		$cod = "01";
		$fab = "MAQ PLAS";
		$mod = "-";
	} else if($maquina === "Corte e Solda 02"){
		$maq = "Corte e Solda";
		$cod = "02";
		$fab = "MAQ PLAS";
		$mod = "-";
	} else if($maquina === "Corte e Solda 03"){
		$maq = "Corte e Solda";
		$cod = "03";
		$fab = "MAQ PLAS";
		$mod = "-";
	} else if($maquina === "Corte e Solda 04"){
		$maq = "Corte e Solda";
		$cod = "04";
		$fab = "MAQ PLAS";
		$mod = "-";
	} else if($maquina === "Corte e Solda 06"){
		$maq = "Corte e Solda";
		$cod = "06";
		$fab = "MAQ PLAS";
		$mod = "CORTE E SOLDA 2000";
	} else if($maquina === "Corte e Solda 07"){
		$maq = "Corte e Solda";
		$cod = "07";
		$fab = "MEGA STEEL";
		$mod = "B-308";
	} else if($maquina === "Corte e Solda 08"){
		$maq = "Corte e Solda";
		$cod = "08";
		$fab = "HECE";
		$mod = "HSC- 1100 PD";
	} else if($maquina === "Recuperadora 01"){
		$maq = "Recuperadora";
		$cod = "01";
		$fab = "PRIMOTÉCNICA";
		$mod = "PET-4000";
	} else if($maquina === "Misturador 01"){
		$maq = "Misturador";
		$cod = "01";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Misturador 02"){
		$maq = "Misturador";
		$cod = "02";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Misturador 03"){
		$maq = "Misturador";
		$cod = "03";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Misturador 04"){
		$maq = "Misturador";
		$cod = "04";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Misturador 05"){
		$maq = "Misturador";
		$cod = "05";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Misturador 06"){
		$maq = "Misturador";
		$cod = "06";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Lavadora de Doctor Blade 01"){
		$maq = "Lavadora de Doctor Blade";
		$cod = "01";
		$fab = "Flexocom";
		$mod = "B.Imersão";
	} else if($maquina === "Lavadora de Doctor Blade 02"){
		$maq = "Lavadora de Doctor Blade";
		$cod = "02";
		$fab = "Flexocom";
		$mod = "B.Imersão";
	} else if($maquina === "Lavadora de Anilox"){
		$maq = "Lavadora de Anilox";
		$cod = "01";
		$fab = "Flexocom";
		$mod = "Ecoclean";
	} else if($maquina === "Lavadora de Bomba de Tinta"){
		$maq = "Lavadora de Bomba de Tinta";
		$cod = "01";
		$fab = "Flexocom";
		$mod = "B.Bomba";
	} else if($maquina === "Policorte"){
		$maq = "Policorte";
		$cod = "01";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Máquina de Cortar Tubete 01"){
		$maq = "Máquina de Cortar Tubete";
		$cod = "01";
		$fab = "Carton";
		$mod = "CT3/6-1600";
	} else if($maquina === "Máquina de Cortar Tubete 02"){
		$maq = "Máquina de Cortar Tubete";
		$cod = "02";
		$fab = "-";
		$mod = "-";
	} else if($maquina === "Stretadeira 01"){
		$maq = "Stretadeira";
		$cod = "01";
		$fab = "OMS";
		$mod = "AV 1600 PM";
	} else if($maquina === "Stretadeira 02"){
		$maq = "Stretadeira";
		$cod = "02";
		$fab = "OMS";
		$mod = "AV 1600 PM";
	} else{
		$cod = "";
		$fab = "";
		$mod = "";
	}


	use Dompdf\Dompdf;

	require_once("../dompdf/autoload.inc.php");

	$dompdf = new DOMPDF();

	$dompdf->set_paper('A4');

		

	$html = '

<html>
<head>
	<title>Ficha Técnica</title>

	<style type="text/css">
		
		p { margin-bottom: 0in; direction: ltr; line-height: 100%; text-align: left; orphans: 0; widows: 0; background: transparent }
		p.western { font-family: "Arial", serif; font-size: 17pt; so-language: pt-PT; font-weight: bold }
		p.cjk { font-family: "Arial"; font-size: 17pt; so-language: pt-PT; font-weight: bold }
		p.ctl { font-family: "Arial"; font-size: 17pt; so-language: pt-PT; font-weight: bold }
	</style>
</head>
<body lang="pt-BR" link="#000080" vlink="#800000" dir="ltr">
<br/>

';
//========================================= SS PRINCIPAL ===================================
		$editprod = editprod($id);
		foreach($editprod as $visu) {

			if($visu->prioridade === null || $visu->prioridade === ''){$visu->prioridade = 'Urgente';}
			if($visu->pecasubstituida === null || $visu->pecasubstituida === ''){$visu->pecasubstituida = '-';}
			if($visu->codigo === null || $visu->codigo === ''){$visu->codigo = '-';}
			if($visu->status === 'Aberta'){$datafinal = '-'; $visu->manutentor = '-'; $visu->manutentor2 = '-'; $visu->horainicial = '-'; $visu->horafinal = '-'; $visu->servico = '-';} else {$datafinal = date('d/m/Y', strtotime($visu->datafinal));}
			if($visu->status != 'Fechada'){$visu->assinatura = '';}
			if($visu->manutentor2 === null || $visu->manutentor2 === '' || $visu->manutentor2 === $visu->manutentor){$visu->manutentor2 = '-';}else { if($visu->horainicial2 === null || $visu->horainicial2 === ''){$visu->horainicial2 = $visu->horainicial;} if($visu->horafinal2 === null || $visu->horafinal2 === ''){$visu->horafinal2 = $visu->horafinal;} }
$html .='




<table style="height: 376px; width: 624px; border-color: #000000;" border="1">
<tbody>
<tr style="height: 23px;">
<td style="width: 190.568px; height: 104px;" rowspan="6"><center><img src="../img/norpack.png" width="120" height="60"/></center></td>
<td style="width: 194.205px; height: 23px;">
<h3 style="text-align: center;"><strong>Solicita&ccedil;&atilde;o de Servi&ccedil;o</strong></h3>
</td>
<td style="width: 217.841px; height: 23px;">SS: '. $id .'</td>
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
';
		$ip = 0;
		$editprod2 = editprod2($id);
		foreach($editprod2 as $v) {
			if($v->status != 'Aberta' && $v->status != 'Em execução'){
			$peca = $v->pecasubstituida;
			if($peca === '' && $ip < 1){$peca = '-'; $ip ++;}
			if($peca === '' && $ip === 1){continue;}
$html .='
<tr style="height: 40px;">
<td style="width: 614.205px; height: 40px; text-align: center;" colspan="3"><br />'.$peca.'<br /><br /></td>
</tr>
';
			}
		}

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



$html .='
<tr style="height: 13px;">
<td style="width: 614.205px; height: 13px;" colspan="3">M&aacute;quina Parada?: '.$visu->maquinaparada.'</td>
</tr>
<tr style="height: 13px;">
<td style="width: 190.568px; height: 13px;">Manutentor: '.$visu->manutentor.'</td>
<td style="width: 190.568px; height: 13px;">Manutentor Auxiliar: '.$visu->manutentor2.'</td>

<td></td>
</tr>

<tr style="height: 13px;">

<td style="width: 194.205px; height: 13px;">Hora inicial: '.$visu->horainicial.'</td>
<td style="width: 217.841px; height: 13px;">Hora Final: '.$visu->horafinal.'</td>
<td></td>
</tr>

<tr style="height: 13px;">
<td style="width: 190.568px; height: 13px;">Data do Serviço: '.date('d/m/Y', strtotime($visu->datafinal)).'</td>
<td style="width: 194.205px; height: 13px;">Recebido por: '.$visu->assinatura.'</td>
<td style="width: 217.841px; height: 13px;">Status SS: '.$visu->status.'</td>
</tr>
</tbody>
</table>


';
	}

//========================================= SS PRINCIPAL ===================================
$html .='



<div style="page-break-after: always"></div>






<table width="100%" cellpadding="1" cellspacing="0">
	<tr>
		<td width="50" height="27" style="border: 3px solid #000000; padding: 0in 0in">
			<img src="../img/norpack.png" width="150px" height="50px" style="margin-left: 50px; margin-top:5px;margin-bottom:5px;" />
		</td>
		<td width="219" style="border: 3px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.04in; margin-top: 0.07in; font-weight: normal">
			<center><font size="2"  style="font-size: 20pt"><b>FICHA TÉCNICA</b></font></center></p>
		</td>
	</tr>
</table>

<br />

<table width="100%" cellpadding="1" cellspacing="0">
	


	<tr valign="top">
		<td width="200" height="27" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.05in; margin-top: 0.07in; font-weight: normal; margin-left:10px;margin-top:10px;">
			<font size="2" style="font-size: 11pt"><font size="2" style="font-size: 11pt"><b>EQUIPAMENTO: '.$maq.'</b></font></font></p>
		</td>
		<td width="219" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.04in; margin-top: 0.07in; font-weight: normal; margin-left:10px;margin-top:10px;">
			<font size="2" style="font-size: 11pt"><font size="2" style="font-size: 11pt"><b>CÓDIGO: '.$cod.'</b></font></font></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="200" height="27" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.05in; margin-top: 0.07in; font-weight: normal; margin-left:10px;margin-top:10px;">
			<font size="2" style="font-size: 11pt"><font size="2" style="font-size: 11pt"><b>MARCA: '.$fab.'</b></font></font></p>
		</td>
		<td width="219" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.04in; margin-top: 0.07in; font-weight: normal; margin-left:10px;margin-top:10px;">
			<font size="2" style="font-size: 11pt"><font size="2" style="font-size: 11pt"><b>MODELO: '.$mod.'</b></font></font></p>
		</td>
	</tr>
</table>
<p lang="pt-PT" class="western" style="margin-top: 0in; font-weight: normal">
<br/>

</p>
<table width="100%" cellpadding="1" cellspacing="0">


	<tr valign="top">
		<td colspan="3" width="326" height="29" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.05in; margin-top: 0.08in; font-weight: normal">
			<font size="2" style="font-size: 11pt"><font size="2" style="font-size: 11pt">MANUTENÇÃO
			PREVENTIVA:</font></font></p>
		</td>
		<td width="130" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.09in; margin-top: 0.08in; font-weight: normal">
			<font size="2" style="font-size: 11pt"><font size="2" style="font-size: 11pt">DATA:</font></font></p>
		</td>
	</tr>

	
';
		$editprod2 = editprod2($id);
		foreach($editprod2 as $visu) {
			if($visu->status != 'Aberta' && $visu->status != 'Em execução'){
			$data = date('d/m/Y', strtotime($visu->data));
			$serv = $visu->servico;
$html .='
	<tr valign="top">
		<td colspan="3" width="326" height="30" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="font-weight: normal; margin-left:5px;"> 

			'.$serv.'


			</p>
		</td>
		<td width="130" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="font-weight: normal; text-align: center;">
			 '.$data.'
			</p>
		</td>
	</tr>
';
			}
		}
$html .='
	

</table>
<br />
<table width="100%" cellpadding="1" cellspacing="0">
	<tr valign="top">
		<td width="419" height="29" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="margin-left: 0.05in; margin-top: 0.08in; font-weight: normal">
			<font size="2" style="font-size: 11pt"><font size="2" style="font-size: 11pt">PEÇAS A SEREM UTILIZADAS:</font></font></p>
		</td>

	</tr>



	
';
		$pc = 0;

		$editprod2 = editprod2($id);
		foreach($editprod2 as $visu) {
			if($visu->status != 'Aberta' && $visu->status != 'Em execução'){
			if($visu->pecasubstituida != ''){
			$data = date('d/m/Y', strtotime($visu->data));
			$peca = $visu->pecasubstituida;
			$pc = 1;
$html .='
	<tr valign="top">
		<td colspan="1" width="326" height="30" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="font-weight: normal; margin-left:5px;">

			'.$peca.'


			</p>
		</td>
	</tr>

';
			}
			}
		}
		if($pc === 0){

$html .='
			<tr valign="top">
		<td colspan="1" width="326" height="30" style="border: 1px solid #000000; padding: 0in 0in"><p lang="pt-PT" style="font-weight: normal; margin-left:5px;"> -</p>
		</td>
	</tr>
';
		}
$html .='
	
</table>



<br />
<p lang="pt-PT" class="western" align="right" style="margin-right: 0.17in; font-weight: normal;float:right;" >
<font size="2" style="font-size: 11pt" ><font size="2" style="font-size: 11pt" >Revisão:
01</font></font></p>



<div style="page-break-after: always"></div>




';
//========================================= SUB SS ===================================

		$meuid = 1;
		$editprod2 = editprod2($id);
		foreach($editprod2 as $visu) {

			if($visu->prioridade === null || $visu->prioridade === ''){$visu->prioridade = 'Urgente';}
			if($visu->pecasubstituida === null || $visu->pecasubstituida === ''){$visu->pecasubstituida = '-';}
			if($visu->codigo === null || $visu->codigo === ''){$visu->codigo = '-';}
			if($visu->status === 'Aberta'){$datafinal = '-'; $visu->manutentor = '-'; $visu->manutentor2 = '-'; $visu->horainicial = '-'; $visu->horafinal = '-'; $visu->servico = '-';} else {$datafinal = date('d/m/Y', strtotime($visu->datafinal));}
			if($visu->status != 'Fechada'){$visu->assinatura = '';}
			if($visu->manutentor2 === null || $visu->manutentor2 === '' || $visu->manutentor2 === $visu->manutentor){$visu->manutentor2 = '-';}else { if($visu->horainicial2 === null || $visu->horainicial2 === ''){$visu->horainicial2 = $visu->horainicial;} if($visu->horafinal2 === null || $visu->horafinal2 === ''){$visu->horafinal2 = $visu->horafinal;} }
$html .='




<table style="height: 376px; width: 624px; border-color: #000000;" border="1">
<tbody>
<tr style="height: 23px;">
<td style="width: 190.568px; height: 104px;" rowspan="6"><center><img src="../img/norpack.png" width="120" height="60"/></center></td>
<td style="width: 194.205px; height: 23px;">
<h3 style="text-align: center;"><strong>Solicita&ccedil;&atilde;o de Servi&ccedil;o</strong></h3>
</td>
<td style="width: 217.841px; height: 23px;">SS: '. $id .' / '.$meuid.'</td>
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
<td style="width: 194.205px; height: 13px;" colspan="2">_</td>
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
<td style="width: 217.841px; height: 13px;">Status SS: '.$visu->status.'</td>
</tr>
</tbody>
</table>




<div style="page-break-after: always"></div>

';
	$meuid ++;
	}
	
//========================================= SUB SS ===================================
$html .='



</body>
</html>


';


		


	$dompdf->load_html($html);

	$dompdf->render();



	$dompdf->stream(
		"fichatecnica.pdf", 
		array(
			"Attachment" => false //Fazer download
		)
	);
?>