<?php

	require "../../funcoes/banco/conexao.php";
	//HORAS PARADAS

	function relatoriocon2($data1, $data2, $maquina){
		$db = "norpack";
		$pdo = conectar($db);

		try{

			$relatoriocon2 = $pdo->prepare("SELECT * FROM dbos WHERE data >= ? AND data < ? AND maquina = ?");
			$relatoriocon2->bindValue(1, $data1, PDO::PARAM_STR);
			$relatoriocon2->bindValue(2, $data2, PDO::PARAM_STR);
			$relatoriocon2->bindValue(3, $maquina, PDO::PARAM_STR);
			$relatoriocon2->execute();

			if($relatoriocon2->rowCount() > 0):
				return $relatoriocon2->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function relatoriocon($data1, $data2, $maquina){
			$horaparada = "00:00:00";
		    if(relatoriocon2($data1, $data2, $maquina)){
		      $relatorioconn = relatoriocon2($data1, $data2, $maquina);
		      foreach($relatorioconn as $rel){
		      	if($rel->maquinaparada === "Sim" && $rel->horaparada != null){

			      	$hp = date('H:i:s', strtotime($rel->horaparada));
					//cria um array com as horas trabalhadas ai quando quiser adicionar mais uma hora nesse array fica mole
					$tempos = array(
					$horaparada,
					$hp,
					);
					//inicializa a variavel segundos com 0
					$segundos = 0;

					foreach ($tempos as $tempo){ //percorre o array $tempo
						list( $h, $m, $s ) = explode( ':', $tempo ); //explode a variavel tempo e coloca as horas em $h, minutos em $m, e os segundos em $s

						//transforma todas os valores em segundos e add na variavel segundos

						$segundos += $h * 3600;
						$segundos += $m * 60;
						$segundos += $s;

					}

					$horas = floor( $segundos / 3600 ); //converte os segundos em horas e arredonda caso nescessario
					$segundos %= 3600; // pega o restante dos segundos subtraidos das horas
					$minutos = floor( $segundos / 60 );//converte os segundos em minutos e arredonda caso nescessario
					$segundos %= 60;// pega o restante dos segundos subtraidos dos minutos

					$horaparada = "{$horas}:{$minutos}:{$segundos}";
			      	}
		  		}
		    }
		    return $horaparada;
		  }

		$resultado = array();

		$extrusora01 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 01");
		$extrusora02 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 02");
		$extrusora03 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 03");
		$extrusora04 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 04");
		$extrusora05 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 05");
		$extrusora06 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 06");
		$extrusora07 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 07");
		$extrusora08 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 08");
		$extrusora09 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 09");
		$extrusora10 = relatoriocon("2020-09-01","2020-10-01", "Extrusora 10");

		$fp4 = relatoriocon("2020-09-01","2020-10-01", "FP4");
		$ft1 = relatoriocon("2020-09-01","2020-10-01", "FT1");
		$fo1 = relatoriocon("2020-09-01","2020-10-01", "FO1");
		$fo2 = relatoriocon("2020-09-01","2020-10-01", "FO2");
		$fo3 = relatoriocon("2020-09-01","2020-10-01", "FO3");

		$rebobinadeira01 = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 01");
		$rebobinadeira02 = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 02");
		$rebobinadeira03 = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 03");
		$rebobinadeira04 = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 04");
		$rebobinadeira05 = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 05");
		$rebobinadeira06 = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 06");

		$cortesolda01 = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 01");
		$cortesolda02 = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 02");
		$cortesolda03 = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 03");
		$cortesolda04 = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 04");
		$cortesolda06 = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 06");
		$cortesolda07 = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 07");
		$cortesolda08 = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 08");

		$recuperadora01 = relatoriocon("2020-09-01","2020-10-01", "Recuperadora 01");

//------------------------------------------------------------------------------------------------------------	
		$resultado[0] = array("mes"=>"Setembro");
//------------------------------------------------------------------------------------------------------------
		$resultado[1] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 01", "horaparada"=>$extrusora01);
		$resultado[2] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 02", "horaparada"=>$extrusora02);
		$resultado[3] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 03", "horaparada"=>$extrusora03);
		$resultado[4] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 04", "horaparada"=>$extrusora04);
		$resultado[5] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 05", "horaparada"=>$extrusora05);
		$resultado[6] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 06", "horaparada"=>$extrusora06);
		$resultado[7] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 07", "horaparada"=>$extrusora07);
		$resultado[8] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 08", "horaparada"=>$extrusora08);
		$resultado[9] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 09", "horaparada"=>$extrusora09);
		$resultado[10] = array("setor"=>"Extrusão", "maquina"=>"Extrusora 10", "horaparada"=>$extrusora10);
//------------------------------------------------------------------------------------------------------------
		$resultado[11] = array("setor"=>"Impressão", "maquina"=>"FP4", "horaparada"=>$fp4);
		$resultado[12] = array("setor"=>"Impressão", "maquina"=>"FT1", "horaparada"=>$ft1);
		$resultado[13] = array("setor"=>"Impressão", "maquina"=>"FO1", "horaparada"=>$fo1);
		$resultado[14] = array("setor"=>"Impressão", "maquina"=>"FO2", "horaparada"=>$fo2);
		$resultado[15] = array("setor"=>"Impressão", "maquina"=>"FO3", "horaparada"=>$fo3);
//------------------------------------------------------------------------------------------------------------
		$resultado[16] = array("setor"=>"Rebobinadeira", "maquina"=>"Rebobinadeira 01", "horaparada"=>$rebobinadeira01);
		$resultado[17] = array("setor"=>"Rebobinadeira", "maquina"=>"Rebobinadeira 02", "horaparada"=>$rebobinadeira02);
		$resultado[18] = array("setor"=>"Rebobinadeira", "maquina"=>"Rebobinadeira 03", "horaparada"=>$rebobinadeira03);
		$resultado[19] = array("setor"=>"Rebobinadeira", "maquina"=>"Rebobinadeira 04", "horaparada"=>$rebobinadeira04);
		$resultado[20] = array("setor"=>"Rebobinadeira", "maquina"=>"Rebobinadeira 05", "horaparada"=>$rebobinadeira05);
		$resultado[21] = array("setor"=>"Rebobinadeira", "maquina"=>"Rebobinadeira 06", "horaparada"=>$rebobinadeira06);
//------------------------------------------------------------------------------------------------------------
		$resultado[22] = array("setor"=>"Corte e Solda", "maquina"=>"Corte e Solda 01", "horaparada"=>$cortesolda01);
		$resultado[23] = array("setor"=>"Corte e Solda", "maquina"=>"Corte e Solda 02", "horaparada"=>$cortesolda02);
		$resultado[24] = array("setor"=>"Corte e Solda", "maquina"=>"Corte e Solda 03", "horaparada"=>$cortesolda03);
		$resultado[25] = array("setor"=>"Corte e Solda", "maquina"=>"Corte e Solda 04", "horaparada"=>$cortesolda04);
		$resultado[26] = array("setor"=>"Corte e Solda", "maquina"=>"Corte e Solda 06", "horaparada"=>$cortesolda06);
		$resultado[27] = array("setor"=>"Corte e Solda", "maquina"=>"Corte e Solda 07", "horaparada"=>$cortesolda07);
		$resultado[28] = array("setor"=>"Corte e Solda", "maquina"=>"Corte e Solda 08", "horaparada"=>$cortesolda08);
		$resultado[29] = array("setor"=>"Recuperadora", "maquina"=>"Recuperadora 01", "horaparada"=>$recuperadora01);




		echo json_encode($resultado);
	

?>