<?php	

	ob_start(); session_start();
	require '../funcoes/banco/conexao.php';
	require '../funcoes/login/login.php';
	require '../funcoes/crud/crud.php';

	logado();

	$mes = $_GET['mes'];
	$maquina = $_GET['maq'];
	$manu = $_GET['manu'];

	if($manu === "2"){
		$manu = "Mecânica";
	}else if($manu === "3"){
		$manu = "Elétrica";
	}else{
		$manu = "";
	}


	if($mes === "01"){
		$data1 = "2021-01-01";
		$data2 = "2021-02-01";
	} else if($mes === "02"){
		$data1 = "2021-02-01";
		$data2 = "2021-03-01";
	} else if($mes === "03"){
		$data1 = "2021-03-01";
		$data2 = "2021-04-01";
	} else if($mes === "04"){
		$data1 = "2021-04-01";
		$data2 = "2021-05-01";
	} else if($mes === "05"){
		$data1 = "2021-05-01";
		$data2 = "2021-06-01";
	} else if($mes === "06"){
		$data1 = "2021-06-01";
		$data2 = "2021-07-01";
	} else if($mes === "07"){
		$data1 = "2021-07-01";
		$data2 = "2021-08-01";
	} else if($mes === "08"){
		$data1 = "2021-08-01";
		$data2 = "2021-09-01";
	} else if($mes === "09"){
		$data1 = "2021-09-01";
		$data2 = "2021-10-01";
	} else if($mes === "10"){
		$data1 = "2021-10-01";
		$data2 = "2021-11-01";
	} else if($mes === "11"){
		$data1 = "2021-11-01";
		$data2 = "2021-12-01";
	} else {
		$data1 = "2021-12-01";
		$data2 = "2022-01-01";
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

	<title>Historico Equipamento</title>
	<style>
	body{

		font-size: 14px;
			font-family:"Arial";
	}
	#tab{
		margin-left:-2px;
		padding: 0;
	}
	td{
			border-width: 1px;
		  border-style: solid;
		  border-color: black;
	}

	</style


	<table id="tab" width="100%">
		<tr>
			<td colspan="4"><h1 align="center" style="font-size:30px;"><center><img src="../img/norpack.png" width="100px" height="40px"/>Histórico Equipamentos</center></h1></td>
		</tr>
		<tr >
			<td colspan="2" style="font-size:17px;"><center><b>EQUIPAMENTO: '.$maq.'</center></b></td>
			<td colspan="2" style="font-size:17px;"><center><b>CÓDIGO: '.$cod.'</center></b></td>
		</tr>
		<tr>
			<td colspan="2" style="font-size:17px;"><center><b>FABRICANTE: '.$fab.'</center></b></td>
			<td colspan="2" style="font-size:17px;"><center><b>MODELO: '.$mod.'</center></b></td>
		</tr>

		<tr>
			<td width="50px"><center><b>OS:  </center></b></td>
			<td><center><b>DATA: </center></b></td>
			<td><center><b>SERVIÇO EXECUTADO: </center></b></td>
			<td><center><b>MATERIAIS UTILIZADOS:  </center></b></td>
		</tr>
';
	if(listarhist($data1, $data2, $maquina)){
		$listaroshist = listarhist($data1, $data2, $maquina);
		foreach($listaroshist as $os) {

			if($os->tipomanu === "Corretiva"){
				if($os->setormanu === $manu)
				{
					if($os->pecasubstituida === ""){
						$pecasubstituida = "-";
					} else{
						$pecasubstituida = $os->pecasubstituida;
					}
	$html .='

			<tr>
				<td><center>'.$os->id.'</center></td>
				<td><center>'.date('d/m/Y', strtotime($os->data)).'</center></td>
				<td><center>'.$os->servico.'</center></td>
				<td><center>'.$pecasubstituida.'</center></td>
			</tr>
	';
				}

			}
		}
	} else {

$html .='
		<tr>
			<td><center>-</center></td>
			<td><center>-</center></td>
			<td><center>-</center></td>
			<td><center>-</center></td>
		</tr>


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