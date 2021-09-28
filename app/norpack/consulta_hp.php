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
			$horaparada = 0;
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

					$horaparada = $horas;
			      	}
		  		}
		    }
		    return $horaparada;
		  }

		$resultado = array();

		$extrusora01jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 01");
		$extrusora01fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 01");
		$extrusora01mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 01");
		$extrusora01abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 01");
		$extrusora01mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 01");
		$extrusora01jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 01");
		$extrusora01jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 01");
		$extrusora01ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 01");
		$extrusora01set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 01");
		$extrusora01out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 01");
		$extrusora01nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 01");
		$extrusora01dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 01");
//------------------------------------------------------------------------------------------------------------
		$extrusora02jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 02");
		$extrusora02fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 02");
		$extrusora02mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 02");
		$extrusora02abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 02");
		$extrusora02mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 02");
		$extrusora02jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 02");
		$extrusora02jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 02");
		$extrusora02ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 02");
		$extrusora02set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 02");
		$extrusora02out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 02");
		$extrusora02nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 02");
		$extrusora02dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 02");
//------------------------------------------------------------------------------------------------------------
		$extrusora03jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 03");
		$extrusora03fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 03");
		$extrusora03mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 03");
		$extrusora03abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 03");
		$extrusora03mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 03");
		$extrusora03jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 03");
		$extrusora03jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 03");
		$extrusora03ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 03");
		$extrusora03set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 03");
		$extrusora03out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 03");
		$extrusora03nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 03");
		$extrusora03dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 03");
//------------------------------------------------------------------------------------------------------------
		$extrusora04jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 04");
		$extrusora04fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 04");
		$extrusora04mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 04");
		$extrusora04abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 04");
		$extrusora04mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 04");
		$extrusora04jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 04");
		$extrusora04jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 04");
		$extrusora04ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 04");
		$extrusora04set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 04");
		$extrusora04out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 04");
		$extrusora04nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 04");
		$extrusora04dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 04");
//------------------------------------------------------------------------------------------------------------
		$extrusora05jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 05");
		$extrusora05fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 05");
		$extrusora05mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 05");
		$extrusora05abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 05");
		$extrusora05mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 05");
		$extrusora05jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 05");
		$extrusora05jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 05");
		$extrusora05ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 05");
		$extrusora05set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 05");
		$extrusora05out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 05");
		$extrusora05nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 05");
		$extrusora05dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 05");
//------------------------------------------------------------------------------------------------------------
		$extrusora06jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 06");
		$extrusora06fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 06");
		$extrusora06mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 06");
		$extrusora06abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 06");
		$extrusora06mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 06");
		$extrusora06jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 06");
		$extrusora06jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 06");
		$extrusora06ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 06");
		$extrusora06set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 06");
		$extrusora06out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 06");
		$extrusora06nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 06");
		$extrusora06dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 06");
//------------------------------------------------------------------------------------------------------------
		$extrusora07jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 07");
		$extrusora07fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 07");
		$extrusora07mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 07");
		$extrusora07abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 07");
		$extrusora07mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 07");
		$extrusora07jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 07");
		$extrusora07jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 07");
		$extrusora07ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 07");
		$extrusora07set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 07");
		$extrusora07out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 07");
		$extrusora07nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 07");
		$extrusora07dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 07");
//------------------------------------------------------------------------------------------------------------
		$extrusora08jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 08");
		$extrusora08fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 08");
		$extrusora08mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 08");
		$extrusora08abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 08");
		$extrusora08mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 08");
		$extrusora08jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 08");
		$extrusora08jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 08");
		$extrusora08ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 08");
		$extrusora08set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 08");
		$extrusora08out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 08");
		$extrusora08nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 08");
		$extrusora08dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 08");
//------------------------------------------------------------------------------------------------------------
		$extrusora09jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 09");
		$extrusora09fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 09");
		$extrusora09mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 09");
		$extrusora09abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 09");
		$extrusora09mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 09");
		$extrusora09jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 09");
		$extrusora09jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 09");
		$extrusora09ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 09");
		$extrusora09set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 09");
		$extrusora09out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 09");
		$extrusora09nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 09");
		$extrusora09dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 09");
//------------------------------------------------------------------------------------------------------------
		$extrusora10jan = relatoriocon("2020-01-01","2020-02-01", "Extrusora 10");
		$extrusora10fev = relatoriocon("2020-02-01","2020-03-01", "Extrusora 10");
		$extrusora10mar = relatoriocon("2020-03-01","2020-04-01", "Extrusora 10");
		$extrusora10abr = relatoriocon("2020-04-01","2020-05-01", "Extrusora 10");
		$extrusora10mai = relatoriocon("2020-05-01","2020-06-01", "Extrusora 10");
		$extrusora10jun = relatoriocon("2020-06-01","2020-07-01", "Extrusora 10");
		$extrusora10jul = relatoriocon("2020-07-01","2020-08-01", "Extrusora 10");
		$extrusora10ago = relatoriocon("2020-08-01","2020-09-01", "Extrusora 10");
		$extrusora10set = relatoriocon("2020-09-01","2020-10-01", "Extrusora 10");
		$extrusora10out = relatoriocon("2020-10-01","2020-11-01", "Extrusora 10");
		$extrusora10nov = relatoriocon("2020-11-01","2020-12-01", "Extrusora 10");
		$extrusora10dez = relatoriocon("2020-12-01","2021-01-01", "Extrusora 10");
//------------------------------------------------------------------------------------------------------------
		$fp4jan = relatoriocon("2020-01-01","2020-02-01", "FP4");
		$fp4fev = relatoriocon("2020-02-01","2020-03-01", "FP4");
		$fp4mar = relatoriocon("2020-03-01","2020-04-01", "FP4");
		$fp4abr = relatoriocon("2020-04-01","2020-05-01", "FP4");
		$fp4mai = relatoriocon("2020-05-01","2020-06-01", "FP4");
		$fp4jun = relatoriocon("2020-06-01","2020-07-01", "FP4");
		$fp4jul = relatoriocon("2020-07-01","2020-08-01", "FP4");
		$fp4ago = relatoriocon("2020-08-01","2020-09-01", "FP4");
		$fp4set = relatoriocon("2020-09-01","2020-10-01", "FP4");
		$fp4out = relatoriocon("2020-10-01","2020-11-01", "FP4");
		$fp4nov = relatoriocon("2020-11-01","2020-12-01", "FP4");
		$fp4dez = relatoriocon("2020-12-01","2021-01-01", "FP4");
//------------------------------------------------------------------------------------------------------------
		$ft1jan = relatoriocon("2020-01-01","2020-02-01", "FT1");
		$ft1fev = relatoriocon("2020-02-01","2020-03-01", "FT1");
		$ft1mar = relatoriocon("2020-03-01","2020-04-01", "FT1");
		$ft1abr = relatoriocon("2020-04-01","2020-05-01", "FT1");
		$ft1mai = relatoriocon("2020-05-01","2020-06-01", "FT1");
		$ft1jun = relatoriocon("2020-06-01","2020-07-01", "FT1");
		$ft1jul = relatoriocon("2020-07-01","2020-08-01", "FT1");
		$ft1ago = relatoriocon("2020-08-01","2020-09-01", "FT1");
		$ft1set = relatoriocon("2020-09-01","2020-10-01", "FT1");
		$ft1out = relatoriocon("2020-10-01","2020-11-01", "FT1");
		$ft1nov = relatoriocon("2020-11-01","2020-12-01", "FT1");
		$ft1dez = relatoriocon("2020-12-01","2021-01-01", "FT1");
//------------------------------------------------------------------------------------------------------------
		$fo1jan = relatoriocon("2020-01-01","2020-02-01", "FO1");
		$fo1fev = relatoriocon("2020-02-01","2020-03-01", "FO1");
		$fo1mar = relatoriocon("2020-03-01","2020-04-01", "FO1");
		$fo1abr = relatoriocon("2020-04-01","2020-05-01", "FO1");
		$fo1mai = relatoriocon("2020-05-01","2020-06-01", "FO1");
		$fo1jun = relatoriocon("2020-06-01","2020-07-01", "FO1");
		$fo1jul = relatoriocon("2020-07-01","2020-08-01", "FO1");
		$fo1ago = relatoriocon("2020-08-01","2020-09-01", "FO1");
		$fo1set = relatoriocon("2020-09-01","2020-10-01", "FO1");
		$fo1out = relatoriocon("2020-10-01","2020-11-01", "FO1");
		$fo1nov = relatoriocon("2020-11-01","2020-12-01", "FO1");
		$fo1dez = relatoriocon("2020-12-01","2021-01-01", "FO1");
//------------------------------------------------------------------------------------------------------------
		$fo2jan = relatoriocon("2020-01-01","2020-02-01", "FO2");
		$fo2fev = relatoriocon("2020-02-01","2020-03-01", "FO2");
		$fo2mar = relatoriocon("2020-03-01","2020-04-01", "FO2");
		$fo2abr = relatoriocon("2020-04-01","2020-05-01", "FO2");
		$fo2mai = relatoriocon("2020-05-01","2020-06-01", "FO2");
		$fo2jun = relatoriocon("2020-06-01","2020-07-01", "FO2");
		$fo2jul = relatoriocon("2020-07-01","2020-08-01", "FO2");
		$fo2ago = relatoriocon("2020-08-01","2020-09-01", "FO2");
		$fo2set = relatoriocon("2020-09-01","2020-10-01", "FO2");
		$fo2out = relatoriocon("2020-10-01","2020-11-01", "FO2");
		$fo2nov = relatoriocon("2020-11-01","2020-12-01", "FO2");
		$fo2dez = relatoriocon("2020-12-01","2021-01-01", "FO2");
//------------------------------------------------------------------------------------------------------------
		$fo3jan = relatoriocon("2020-01-01","2020-02-01", "FO3");
		$fo3fev = relatoriocon("2020-02-01","2020-03-01", "FO3");
		$fo3mar = relatoriocon("2020-03-01","2020-04-01", "FO3");
		$fo3abr = relatoriocon("2020-04-01","2020-05-01", "FO3");
		$fo3mai = relatoriocon("2020-05-01","2020-06-01", "FO3");
		$fo3jun = relatoriocon("2020-06-01","2020-07-01", "FO3");
		$fo3jul = relatoriocon("2020-07-01","2020-08-01", "FO3");
		$fo3ago = relatoriocon("2020-08-01","2020-09-01", "FO3");
		$fo3set = relatoriocon("2020-09-01","2020-10-01", "FO3");
		$fo3out = relatoriocon("2020-10-01","2020-11-01", "FO3");
		$fo3nov = relatoriocon("2020-11-01","2020-12-01", "FO3");
		$fo3dez = relatoriocon("2020-12-01","2021-01-01", "FO3");
//------------------------------------------------------------------------------------------------------------
		$rebobinadeira01jan = relatoriocon("2020-01-01","2020-02-01", "Rebobinadeira 01");
		$rebobinadeira01fev = relatoriocon("2020-02-01","2020-03-01", "Rebobinadeira 01");
		$rebobinadeira01mar = relatoriocon("2020-03-01","2020-04-01", "Rebobinadeira 01");
		$rebobinadeira01abr = relatoriocon("2020-04-01","2020-05-01", "Rebobinadeira 01");
		$rebobinadeira01mai = relatoriocon("2020-05-01","2020-06-01", "Rebobinadeira 01");
		$rebobinadeira01jun = relatoriocon("2020-06-01","2020-07-01", "Rebobinadeira 01");
		$rebobinadeira01jul = relatoriocon("2020-07-01","2020-08-01", "Rebobinadeira 01");
		$rebobinadeira01ago = relatoriocon("2020-08-01","2020-09-01", "Rebobinadeira 01");
		$rebobinadeira01set = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 01");
		$rebobinadeira01out = relatoriocon("2020-10-01","2020-11-01", "Rebobinadeira 01");
		$rebobinadeira01nov = relatoriocon("2020-11-01","2020-12-01", "Rebobinadeira 01");
		$rebobinadeira01dez = relatoriocon("2020-12-01","2021-01-01", "Rebobinadeira 01");
//------------------------------------------------------------------------------------------------------------
		$rebobinadeira02jan = relatoriocon("2020-01-01","2020-02-01", "Rebobinadeira 02");
		$rebobinadeira02fev = relatoriocon("2020-02-01","2020-03-01", "Rebobinadeira 02");
		$rebobinadeira02mar = relatoriocon("2020-03-01","2020-04-01", "Rebobinadeira 02");
		$rebobinadeira02abr = relatoriocon("2020-04-01","2020-05-01", "Rebobinadeira 02");
		$rebobinadeira02mai = relatoriocon("2020-05-01","2020-06-01", "Rebobinadeira 02");
		$rebobinadeira02jun = relatoriocon("2020-06-01","2020-07-01", "Rebobinadeira 02");
		$rebobinadeira02jul = relatoriocon("2020-07-01","2020-08-01", "Rebobinadeira 02");
		$rebobinadeira02ago = relatoriocon("2020-08-01","2020-09-01", "Rebobinadeira 02");
		$rebobinadeira02set = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 02");
		$rebobinadeira02out = relatoriocon("2020-10-01","2020-11-01", "Rebobinadeira 02");
		$rebobinadeira02nov = relatoriocon("2020-11-01","2020-12-01", "Rebobinadeira 02");
		$rebobinadeira02dez = relatoriocon("2020-12-01","2021-01-01", "Rebobinadeira 02");
//------------------------------------------------------------------------------------------------------------
		$rebobinadeira03jan = relatoriocon("2020-01-01","2020-02-01", "Rebobinadeira 03");
		$rebobinadeira03fev = relatoriocon("2020-02-01","2020-03-01", "Rebobinadeira 03");
		$rebobinadeira03mar = relatoriocon("2020-03-01","2020-04-01", "Rebobinadeira 03");
		$rebobinadeira03abr = relatoriocon("2020-04-01","2020-05-01", "Rebobinadeira 03");
		$rebobinadeira03mai = relatoriocon("2020-05-01","2020-06-01", "Rebobinadeira 03");
		$rebobinadeira03jun = relatoriocon("2020-06-01","2020-07-01", "Rebobinadeira 03");
		$rebobinadeira03jul = relatoriocon("2020-07-01","2020-08-01", "Rebobinadeira 03");
		$rebobinadeira03ago = relatoriocon("2020-08-01","2020-09-01", "Rebobinadeira 03");
		$rebobinadeira03set = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 03");
		$rebobinadeira03out = relatoriocon("2020-10-01","2020-11-01", "Rebobinadeira 03");
		$rebobinadeira03nov = relatoriocon("2020-11-01","2020-12-01", "Rebobinadeira 03");
		$rebobinadeira03dez = relatoriocon("2020-12-01","2021-01-01", "Rebobinadeira 03");
//------------------------------------------------------------------------------------------------------------
		$rebobinadeira04jan = relatoriocon("2020-01-01","2020-02-01", "Rebobinadeira 04");
		$rebobinadeira04fev = relatoriocon("2020-02-01","2020-03-01", "Rebobinadeira 04");
		$rebobinadeira04mar = relatoriocon("2020-03-01","2020-04-01", "Rebobinadeira 04");
		$rebobinadeira04abr = relatoriocon("2020-04-01","2020-05-01", "Rebobinadeira 04");
		$rebobinadeira04mai = relatoriocon("2020-05-01","2020-06-01", "Rebobinadeira 04");
		$rebobinadeira04jun = relatoriocon("2020-06-01","2020-07-01", "Rebobinadeira 04");
		$rebobinadeira04jul = relatoriocon("2020-07-01","2020-08-01", "Rebobinadeira 04");
		$rebobinadeira04ago = relatoriocon("2020-08-01","2020-09-01", "Rebobinadeira 04");
		$rebobinadeira04set = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 04");
		$rebobinadeira04out = relatoriocon("2020-10-01","2020-11-01", "Rebobinadeira 04");
		$rebobinadeira04nov = relatoriocon("2020-11-01","2020-12-01", "Rebobinadeira 04");
		$rebobinadeira04dez = relatoriocon("2020-12-01","2021-01-01", "Rebobinadeira 04");
//------------------------------------------------------------------------------------------------------------
		$rebobinadeira05jan = relatoriocon("2020-01-01","2020-02-01", "Rebobinadeira 05");
		$rebobinadeira05fev = relatoriocon("2020-02-01","2020-03-01", "Rebobinadeira 05");
		$rebobinadeira05mar = relatoriocon("2020-03-01","2020-04-01", "Rebobinadeira 05");
		$rebobinadeira05abr = relatoriocon("2020-04-01","2020-05-01", "Rebobinadeira 05");
		$rebobinadeira05mai = relatoriocon("2020-05-01","2020-06-01", "Rebobinadeira 05");
		$rebobinadeira05jun = relatoriocon("2020-06-01","2020-07-01", "Rebobinadeira 05");
		$rebobinadeira05jul = relatoriocon("2020-07-01","2020-08-01", "Rebobinadeira 05");
		$rebobinadeira05ago = relatoriocon("2020-08-01","2020-09-01", "Rebobinadeira 05");
		$rebobinadeira05set = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 05");
		$rebobinadeira05out = relatoriocon("2020-10-01","2020-11-01", "Rebobinadeira 05");
		$rebobinadeira05nov = relatoriocon("2020-11-01","2020-12-01", "Rebobinadeira 05");
		$rebobinadeira05dez = relatoriocon("2020-12-01","2021-01-01", "Rebobinadeira 05");
//------------------------------------------------------------------------------------------------------------
		$rebobinadeira06jan = relatoriocon("2020-01-01","2020-02-01", "Rebobinadeira 06");
		$rebobinadeira06fev = relatoriocon("2020-02-01","2020-03-01", "Rebobinadeira 06");
		$rebobinadeira06mar = relatoriocon("2020-03-01","2020-04-01", "Rebobinadeira 06");
		$rebobinadeira06abr = relatoriocon("2020-04-01","2020-05-01", "Rebobinadeira 06");
		$rebobinadeira06mai = relatoriocon("2020-05-01","2020-06-01", "Rebobinadeira 06");
		$rebobinadeira06jun = relatoriocon("2020-06-01","2020-07-01", "Rebobinadeira 06");
		$rebobinadeira06jul = relatoriocon("2020-07-01","2020-08-01", "Rebobinadeira 06");
		$rebobinadeira06ago = relatoriocon("2020-08-01","2020-09-01", "Rebobinadeira 06");
		$rebobinadeira06set = relatoriocon("2020-09-01","2020-10-01", "Rebobinadeira 06");
		$rebobinadeira06out = relatoriocon("2020-10-01","2020-11-01", "Rebobinadeira 06");
		$rebobinadeira06nov = relatoriocon("2020-11-01","2020-12-01", "Rebobinadeira 06");
		$rebobinadeira06dez = relatoriocon("2020-12-01","2021-01-01", "Rebobinadeira 06");
//------------------------------------------------------------------------------------------------------------
		$cortesolda01jan = relatoriocon("2020-01-01","2020-02-01", "Corte e Solda 01");
		$cortesolda01fev = relatoriocon("2020-02-01","2020-03-01", "Corte e Solda 01");
		$cortesolda01mar = relatoriocon("2020-03-01","2020-04-01", "Corte e Solda 01");
		$cortesolda01abr = relatoriocon("2020-04-01","2020-05-01", "Corte e Solda 01");
		$cortesolda01mai = relatoriocon("2020-05-01","2020-06-01", "Corte e Solda 01");
		$cortesolda01jun = relatoriocon("2020-06-01","2020-07-01", "Corte e Solda 01");
		$cortesolda01jul = relatoriocon("2020-07-01","2020-08-01", "Corte e Solda 01");
		$cortesolda01ago = relatoriocon("2020-08-01","2020-09-01", "Corte e Solda 01");
		$cortesolda01set = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 01");
		$cortesolda01out = relatoriocon("2020-10-01","2020-11-01", "Corte e Solda 01");
		$cortesolda01nov = relatoriocon("2020-11-01","2020-12-01", "Corte e Solda 01");
		$cortesolda01dez = relatoriocon("2020-12-01","2021-01-01", "Corte e Solda 01");
//------------------------------------------------------------------------------------------------------------
		$cortesolda02jan = relatoriocon("2020-01-01","2020-02-01", "Corte e Solda 02");
		$cortesolda02fev = relatoriocon("2020-02-01","2020-03-01", "Corte e Solda 02");
		$cortesolda02mar = relatoriocon("2020-03-01","2020-04-01", "Corte e Solda 02");
		$cortesolda02abr = relatoriocon("2020-04-01","2020-05-01", "Corte e Solda 02");
		$cortesolda02mai = relatoriocon("2020-05-01","2020-06-01", "Corte e Solda 02");
		$cortesolda02jun = relatoriocon("2020-06-01","2020-07-01", "Corte e Solda 02");
		$cortesolda02jul = relatoriocon("2020-07-01","2020-08-01", "Corte e Solda 02");
		$cortesolda02ago = relatoriocon("2020-08-01","2020-09-01", "Corte e Solda 02");
		$cortesolda02set = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 02");
		$cortesolda02out = relatoriocon("2020-10-01","2020-11-01", "Corte e Solda 02");
		$cortesolda02nov = relatoriocon("2020-11-01","2020-12-01", "Corte e Solda 02");
		$cortesolda02dez = relatoriocon("2020-12-01","2021-01-01", "Corte e Solda 02");
//------------------------------------------------------------------------------------------------------------
		$cortesolda03jan = relatoriocon("2020-01-01","2020-02-01", "Corte e Solda 03");
		$cortesolda03fev = relatoriocon("2020-02-01","2020-03-01", "Corte e Solda 03");
		$cortesolda03mar = relatoriocon("2020-03-01","2020-04-01", "Corte e Solda 03");
		$cortesolda03abr = relatoriocon("2020-04-01","2020-05-01", "Corte e Solda 03");
		$cortesolda03mai = relatoriocon("2020-05-01","2020-06-01", "Corte e Solda 03");
		$cortesolda03jun = relatoriocon("2020-06-01","2020-07-01", "Corte e Solda 03");
		$cortesolda03jul = relatoriocon("2020-07-01","2020-08-01", "Corte e Solda 03");
		$cortesolda03ago = relatoriocon("2020-08-01","2020-09-01", "Corte e Solda 03");
		$cortesolda03set = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 03");
		$cortesolda03out = relatoriocon("2020-10-01","2020-11-01", "Corte e Solda 03");
		$cortesolda03nov = relatoriocon("2020-11-01","2020-12-01", "Corte e Solda 03");
		$cortesolda03dez = relatoriocon("2020-12-01","2021-01-01", "Corte e Solda 03");
//------------------------------------------------------------------------------------------------------------
		$cortesolda04jan = relatoriocon("2020-01-01","2020-02-01", "Corte e Solda 04");
		$cortesolda04fev = relatoriocon("2020-02-01","2020-03-01", "Corte e Solda 04");
		$cortesolda04mar = relatoriocon("2020-03-01","2020-04-01", "Corte e Solda 04");
		$cortesolda04abr = relatoriocon("2020-04-01","2020-05-01", "Corte e Solda 04");
		$cortesolda04mai = relatoriocon("2020-05-01","2020-06-01", "Corte e Solda 04");
		$cortesolda04jun = relatoriocon("2020-06-01","2020-07-01", "Corte e Solda 04");
		$cortesolda04jul = relatoriocon("2020-07-01","2020-08-01", "Corte e Solda 04");
		$cortesolda04ago = relatoriocon("2020-08-01","2020-09-01", "Corte e Solda 04");
		$cortesolda04set = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 04");
		$cortesolda04out = relatoriocon("2020-10-01","2020-11-01", "Corte e Solda 04");
		$cortesolda04nov = relatoriocon("2020-11-01","2020-12-01", "Corte e Solda 04");
		$cortesolda04dez = relatoriocon("2020-12-01","2021-01-01", "Corte e Solda 04");
//------------------------------------------------------------------------------------------------------------
		$cortesolda06jan = relatoriocon("2020-01-01","2020-02-01", "Corte e Solda 06");
		$cortesolda06fev = relatoriocon("2020-02-01","2020-03-01", "Corte e Solda 06");
		$cortesolda06mar = relatoriocon("2020-03-01","2020-04-01", "Corte e Solda 06");
		$cortesolda06abr = relatoriocon("2020-04-01","2020-05-01", "Corte e Solda 06");
		$cortesolda06mai = relatoriocon("2020-05-01","2020-06-01", "Corte e Solda 06");
		$cortesolda06jun = relatoriocon("2020-06-01","2020-07-01", "Corte e Solda 06");
		$cortesolda06jul = relatoriocon("2020-07-01","2020-08-01", "Corte e Solda 06");
		$cortesolda06ago = relatoriocon("2020-08-01","2020-09-01", "Corte e Solda 06");
		$cortesolda06set = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 06");
		$cortesolda06out = relatoriocon("2020-10-01","2020-11-01", "Corte e Solda 06");
		$cortesolda06nov = relatoriocon("2020-11-01","2020-12-01", "Corte e Solda 06");
		$cortesolda06dez = relatoriocon("2020-12-01","2021-01-01", "Corte e Solda 06");
//------------------------------------------------------------------------------------------------------------
		$cortesolda07jan = relatoriocon("2020-01-01","2020-02-01", "Corte e Solda 07");
		$cortesolda07fev = relatoriocon("2020-02-01","2020-03-01", "Corte e Solda 07");
		$cortesolda07mar = relatoriocon("2020-03-01","2020-04-01", "Corte e Solda 07");
		$cortesolda07abr = relatoriocon("2020-04-01","2020-05-01", "Corte e Solda 07");
		$cortesolda07mai = relatoriocon("2020-05-01","2020-06-01", "Corte e Solda 07");
		$cortesolda07jun = relatoriocon("2020-06-01","2020-07-01", "Corte e Solda 07");
		$cortesolda07jul = relatoriocon("2020-07-01","2020-08-01", "Corte e Solda 07");
		$cortesolda07ago = relatoriocon("2020-08-01","2020-09-01", "Corte e Solda 07");
		$cortesolda07set = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 07");
		$cortesolda07out = relatoriocon("2020-10-01","2020-11-01", "Corte e Solda 07");
		$cortesolda07nov = relatoriocon("2020-11-01","2020-12-01", "Corte e Solda 07");
		$cortesolda07dez = relatoriocon("2020-12-01","2021-01-01", "Corte e Solda 07");
//------------------------------------------------------------------------------------------------------------
		$cortesolda08jan = relatoriocon("2020-01-01","2020-02-01", "Corte e Solda 08");
		$cortesolda08fev = relatoriocon("2020-02-01","2020-03-01", "Corte e Solda 08");
		$cortesolda08mar = relatoriocon("2020-03-01","2020-04-01", "Corte e Solda 08");
		$cortesolda08abr = relatoriocon("2020-04-01","2020-05-01", "Corte e Solda 08");
		$cortesolda08mai = relatoriocon("2020-05-01","2020-06-01", "Corte e Solda 08");
		$cortesolda08jun = relatoriocon("2020-06-01","2020-07-01", "Corte e Solda 08");
		$cortesolda08jul = relatoriocon("2020-07-01","2020-08-01", "Corte e Solda 08");
		$cortesolda08ago = relatoriocon("2020-08-01","2020-09-01", "Corte e Solda 08");
		$cortesolda08set = relatoriocon("2020-09-01","2020-10-01", "Corte e Solda 08");
		$cortesolda08out = relatoriocon("2020-10-01","2020-11-01", "Corte e Solda 08");
		$cortesolda08nov = relatoriocon("2020-11-01","2020-12-01", "Corte e Solda 08");
		$cortesolda08dez = relatoriocon("2020-12-01","2021-01-01", "Corte e Solda 08");
//------------------------------------------------------------------------------------------------------------
		$recuperadora01jan = relatoriocon("2020-01-01","2020-02-01", "Recuperadora 01");
		$recuperadora01fev = relatoriocon("2020-02-01","2020-03-01", "Recuperadora 01");
		$recuperadora01mar = relatoriocon("2020-03-01","2020-04-01", "Recuperadora 01");
		$recuperadora01abr = relatoriocon("2020-04-01","2020-05-01", "Recuperadora 01");
		$recuperadora01mai = relatoriocon("2020-05-01","2020-06-01", "Recuperadora 01");
		$recuperadora01jun = relatoriocon("2020-06-01","2020-07-01", "Recuperadora 01");
		$recuperadora01jul = relatoriocon("2020-07-01","2020-08-01", "Recuperadora 01");
		$recuperadora01ago = relatoriocon("2020-08-01","2020-09-01", "Recuperadora 01");
		$recuperadora01set = relatoriocon("2020-09-01","2020-10-01", "Recuperadora 01");
		$recuperadora01out = relatoriocon("2020-10-01","2020-11-01", "Recuperadora 01");
		$recuperadora01nov = relatoriocon("2020-11-01","2020-12-01", "Recuperadora 01");
		$recuperadora01dez = relatoriocon("2020-12-01","2021-01-01", "Recuperadora 01");


//------------------------------------------------------------------------------------------------------------
		$resultado[0] = array("maquina"=>"Extrusora 01", "jan"=>$extrusora01jan, "fev"=>$extrusora01fev, "mar"=>$extrusora01mar, "abr"=>$extrusora01abr, "mai"=>$extrusora01mai, "jun"=>$extrusora01jun, "jul"=>$extrusora01jul, "ago"=>$extrusora01ago, "set"=>$extrusora01set, "out"=>$extrusora01out, "nov"=>$extrusora01nov, "dez"=>$extrusora01dez);
		$resultado[1] = array("maquina"=>"Extrusora 02", "jan"=>$extrusora02jan, "fev"=>$extrusora02fev, "mar"=>$extrusora02mar, "abr"=>$extrusora02abr, "mai"=>$extrusora02mai, "jun"=>$extrusora02jun, "jul"=>$extrusora02jul, "ago"=>$extrusora02ago, "set"=>$extrusora02set, "out"=>$extrusora02out, "nov"=>$extrusora02nov, "dez"=>$extrusora02dez);
		$resultado[2] = array("maquina"=>"Extrusora 03", "jan"=>$extrusora03jan, "fev"=>$extrusora03fev, "mar"=>$extrusora03mar, "abr"=>$extrusora03abr, "mai"=>$extrusora03mai, "jun"=>$extrusora03jun, "jul"=>$extrusora03jul, "ago"=>$extrusora03ago, "set"=>$extrusora03set, "out"=>$extrusora03out, "nov"=>$extrusora03nov, "dez"=>$extrusora03dez);
		$resultado[3] = array("maquina"=>"Extrusora 04", "jan"=>$extrusora04jan, "fev"=>$extrusora04fev, "mar"=>$extrusora04mar, "abr"=>$extrusora04abr, "mai"=>$extrusora04mai, "jun"=>$extrusora04jun, "jul"=>$extrusora04jul, "ago"=>$extrusora04ago, "set"=>$extrusora04set, "out"=>$extrusora04out, "nov"=>$extrusora04nov, "dez"=>$extrusora04dez);
		$resultado[4] = array("maquina"=>"Extrusora 05", "jan"=>$extrusora05jan, "fev"=>$extrusora05fev, "mar"=>$extrusora05mar, "abr"=>$extrusora05abr, "mai"=>$extrusora05mai, "jun"=>$extrusora05jun, "jul"=>$extrusora05jul, "ago"=>$extrusora05ago, "set"=>$extrusora05set, "out"=>$extrusora05out, "nov"=>$extrusora05nov, "dez"=>$extrusora05dez);
		$resultado[5] = array("maquina"=>"Extrusora 06", "jan"=>$extrusora06jan, "fev"=>$extrusora06fev, "mar"=>$extrusora06mar, "abr"=>$extrusora06abr, "mai"=>$extrusora06mai, "jun"=>$extrusora06jun, "jul"=>$extrusora06jul, "ago"=>$extrusora06ago, "set"=>$extrusora06set, "out"=>$extrusora06out, "nov"=>$extrusora06nov, "dez"=>$extrusora06dez);
		$resultado[6] = array("maquina"=>"Extrusora 07", "jan"=>$extrusora07jan, "fev"=>$extrusora07fev, "mar"=>$extrusora07mar, "abr"=>$extrusora07abr, "mai"=>$extrusora07mai, "jun"=>$extrusora07jun, "jul"=>$extrusora07jul, "ago"=>$extrusora07ago, "set"=>$extrusora07set, "out"=>$extrusora07out, "nov"=>$extrusora07nov, "dez"=>$extrusora07dez);
		$resultado[7] = array("maquina"=>"Extrusora 08", "jan"=>$extrusora08jan, "fev"=>$extrusora08fev, "mar"=>$extrusora08mar, "abr"=>$extrusora08abr, "mai"=>$extrusora08mai, "jun"=>$extrusora08jun, "jul"=>$extrusora08jul, "ago"=>$extrusora08ago, "set"=>$extrusora08set, "out"=>$extrusora08out, "nov"=>$extrusora08nov, "dez"=>$extrusora08dez);
		$resultado[8] = array("maquina"=>"Extrusora 09", "jan"=>$extrusora09jan, "fev"=>$extrusora09fev, "mar"=>$extrusora09mar, "abr"=>$extrusora09abr, "mai"=>$extrusora09mai, "jun"=>$extrusora09jun, "jul"=>$extrusora09jul, "ago"=>$extrusora09ago, "set"=>$extrusora09set, "out"=>$extrusora09out, "nov"=>$extrusora09nov, "dez"=>$extrusora09dez);
		$resultado[9] = array("maquina"=>"Extrusora 10", "jan"=>$extrusora10jan, "fev"=>$extrusora10fev, "mar"=>$extrusora10mar, "abr"=>$extrusora10abr, "mai"=>$extrusora10mai, "jun"=>$extrusora10jun, "jul"=>$extrusora10jul, "ago"=>$extrusora10ago, "set"=>$extrusora10set, "out"=>$extrusora10out, "nov"=>$extrusora10nov, "dez"=>$extrusora10dez);
//------------------------------------------------------------------------------------------------------------
		$resultado[10] = array("maquina"=>"FP4", "jan"=>$fp4jan, "fev"=>$fp4fev, "mar"=>$fp4mar, "abr"=>$fp4abr, "mai"=>$fp4mai, "jun"=>$fp4jun, "jul"=>$fp4jul, "ago"=>$fp4ago, "set"=>$fp4set, "out"=>$fp4out, "nov"=>$fp4nov, "dez"=>$fp4dez);
		$resultado[11] = array("maquina"=>"FT1", "jan"=>$ft1jan, "fev"=>$ft1fev, "mar"=>$ft1mar, "abr"=>$ft1abr, "mai"=>$ft1mai, "jun"=>$ft1jun, "jul"=>$ft1jul, "ago"=>$ft1ago, "set"=>$ft1set, "out"=>$ft1out, "nov"=>$ft1nov, "dez"=>$ft1dez);
		$resultado[12] = array("maquina"=>"FO1", "jan"=>$fo1jan, "fev"=>$fo1fev, "mar"=>$fo1mar, "abr"=>$fo1abr, "mai"=>$fo1mai, "jun"=>$fo1jun, "jul"=>$fo1jul, "ago"=>$fo1ago, "set"=>$fo1set, "out"=>$fo1out, "nov"=>$fo1nov, "dez"=>$fo1dez);
		$resultado[13] = array("maquina"=>"FO2", "jan"=>$fo2jan, "fev"=>$fo2fev, "mar"=>$fo2mar, "abr"=>$fo2abr, "mai"=>$fo2mai, "jun"=>$fo2jun, "jul"=>$fo2jul, "ago"=>$fo2ago, "set"=>$fo2set, "out"=>$fo2out, "nov"=>$fo2nov, "dez"=>$fo2dez);
		$resultado[14] = array("maquina"=>"FO3", "jan"=>$fo3jan, "fev"=>$fo3fev, "mar"=>$fo3mar, "abr"=>$fo3abr, "mai"=>$fo3mai, "jun"=>$fo3jun, "jul"=>$fo3jul, "ago"=>$fo3ago, "set"=>$fo3set, "out"=>$fo3out, "nov"=>$fo3nov, "dez"=>$fo3dez);
//------------------------------------------------------------------------------------------------------------
		$resultado[15] = array("maquina"=>"Rebobinadeira 01", "jan"=>$rebobinadeira01jan, "fev"=>$rebobinadeira01fev, "mar"=>$rebobinadeira01mar, "abr"=>$rebobinadeira01abr, "mai"=>$rebobinadeira01mai, "jun"=>$rebobinadeira01jun, "jul"=>$rebobinadeira01jul, "ago"=>$rebobinadeira01ago, "set"=>$rebobinadeira01set, "out"=>$rebobinadeira01out, "nov"=>$rebobinadeira01nov, "dez"=>$rebobinadeira01dez);
		$resultado[16] = array("maquina"=>"Rebobinadeira 02", "jan"=>$rebobinadeira02jan, "fev"=>$rebobinadeira02fev, "mar"=>$rebobinadeira02mar, "abr"=>$rebobinadeira02abr, "mai"=>$rebobinadeira02mai, "jun"=>$rebobinadeira02jun, "jul"=>$rebobinadeira02jul, "ago"=>$rebobinadeira02ago, "set"=>$rebobinadeira02set, "out"=>$rebobinadeira02out, "nov"=>$rebobinadeira02nov, "dez"=>$rebobinadeira02dez);
		$resultado[17] = array("maquina"=>"Rebobinadeira 03", "jan"=>$rebobinadeira03jan, "fev"=>$rebobinadeira03fev, "mar"=>$rebobinadeira03mar, "abr"=>$rebobinadeira03abr, "mai"=>$rebobinadeira03mai, "jun"=>$rebobinadeira03jun, "jul"=>$rebobinadeira03jul, "ago"=>$rebobinadeira03ago, "set"=>$rebobinadeira03set, "out"=>$rebobinadeira03out, "nov"=>$rebobinadeira03nov, "dez"=>$rebobinadeira03dez);
		$resultado[18] = array("maquina"=>"Rebobinadeira 04", "jan"=>$rebobinadeira04jan, "fev"=>$rebobinadeira04fev, "mar"=>$rebobinadeira04mar, "abr"=>$rebobinadeira04abr, "mai"=>$rebobinadeira04mai, "jun"=>$rebobinadeira04jun, "jul"=>$rebobinadeira04jul, "ago"=>$rebobinadeira04ago, "set"=>$rebobinadeira04set, "out"=>$rebobinadeira04out, "nov"=>$rebobinadeira04nov, "dez"=>$rebobinadeira04dez);
		$resultado[19] = array("maquina"=>"Rebobinadeira 05", "jan"=>$rebobinadeira05jan, "fev"=>$rebobinadeira05fev, "mar"=>$rebobinadeira05mar, "abr"=>$rebobinadeira05abr, "mai"=>$rebobinadeira05mai, "jun"=>$rebobinadeira05jun, "jul"=>$rebobinadeira05jul, "ago"=>$rebobinadeira05ago, "set"=>$rebobinadeira05set, "out"=>$rebobinadeira05out, "nov"=>$rebobinadeira05nov, "dez"=>$rebobinadeira05dez);
		$resultado[20] = array("maquina"=>"Rebobinadeira 06", "jan"=>$rebobinadeira06jan, "fev"=>$rebobinadeira06fev, "mar"=>$rebobinadeira06mar, "abr"=>$rebobinadeira06abr, "mai"=>$rebobinadeira06mai, "jun"=>$rebobinadeira06jun, "jul"=>$rebobinadeira06jul, "ago"=>$rebobinadeira06ago, "set"=>$rebobinadeira06set, "out"=>$rebobinadeira06out, "nov"=>$rebobinadeira06nov, "dez"=>$rebobinadeira06dez);
//------------------------------------------------------------------------------------------------------------
		$resultado[21] = array("maquina"=>"Corte e Solda 01", "jan"=>$cortesolda01jan, "fev"=>$cortesolda01fev, "mar"=>$cortesolda01mar, "abr"=>$cortesolda01abr, "mai"=>$cortesolda01mai, "jun"=>$cortesolda01jun, "jul"=>$cortesolda01jul, "ago"=>$cortesolda01ago, "set"=>$cortesolda01set, "out"=>$cortesolda01out, "nov"=>$cortesolda01nov, "dez"=>$cortesolda01dez);
		$resultado[22] = array("maquina"=>"Corte e Solda 02", "jan"=>$cortesolda02jan, "fev"=>$cortesolda02fev, "mar"=>$cortesolda02mar, "abr"=>$cortesolda02abr, "mai"=>$cortesolda02mai, "jun"=>$cortesolda02jun, "jul"=>$cortesolda02jul, "ago"=>$cortesolda02ago, "set"=>$cortesolda02set, "out"=>$cortesolda02out, "nov"=>$cortesolda02nov, "dez"=>$cortesolda02dez);
		$resultado[23] = array("maquina"=>"Corte e Solda 03", "jan"=>$cortesolda03jan, "fev"=>$cortesolda03fev, "mar"=>$cortesolda03mar, "abr"=>$cortesolda03abr, "mai"=>$cortesolda03mai, "jun"=>$cortesolda03jun, "jul"=>$cortesolda03jul, "ago"=>$cortesolda03ago, "set"=>$cortesolda03set, "out"=>$cortesolda03out, "nov"=>$cortesolda03nov, "dez"=>$cortesolda03dez);
		$resultado[24] = array("maquina"=>"Corte e Solda 04", "jan"=>$cortesolda04jan, "fev"=>$cortesolda04fev, "mar"=>$cortesolda04mar, "abr"=>$cortesolda04abr, "mai"=>$cortesolda04mai, "jun"=>$cortesolda04jun, "jul"=>$cortesolda04jul, "ago"=>$cortesolda04ago, "set"=>$cortesolda04set, "out"=>$cortesolda04out, "nov"=>$cortesolda04nov, "dez"=>$cortesolda04dez);
		$resultado[25] = array("maquina"=>"Corte e Solda 06", "jan"=>$cortesolda06jan, "fev"=>$cortesolda06fev, "mar"=>$cortesolda06mar, "abr"=>$cortesolda06abr, "mai"=>$cortesolda06mai, "jun"=>$cortesolda06jun, "jul"=>$cortesolda06jul, "ago"=>$cortesolda06ago, "set"=>$cortesolda06set, "out"=>$cortesolda06out, "nov"=>$cortesolda06nov, "dez"=>$cortesolda06dez);
		$resultado[26] = array("maquina"=>"Corte e Solda 07", "jan"=>$cortesolda07jan, "fev"=>$cortesolda07fev, "mar"=>$cortesolda07mar, "abr"=>$cortesolda07abr, "mai"=>$cortesolda07mai, "jun"=>$cortesolda07jun, "jul"=>$cortesolda07jul, "ago"=>$cortesolda07ago, "set"=>$cortesolda07set, "out"=>$cortesolda07out, "nov"=>$cortesolda07nov, "dez"=>$cortesolda07dez);
		$resultado[27] = array("maquina"=>"Corte e Solda 08", "jan"=>$cortesolda08jan, "fev"=>$cortesolda08fev, "mar"=>$cortesolda08mar, "abr"=>$cortesolda08abr, "mai"=>$cortesolda08mai, "jun"=>$cortesolda08jun, "jul"=>$cortesolda08jul, "ago"=>$cortesolda08ago, "set"=>$cortesolda08set, "out"=>$cortesolda08out, "nov"=>$cortesolda08nov, "dez"=>$cortesolda08dez);
//------------------------------------------------------------------------------------------------------------
		$resultado[28] = array("maquina"=>"Recuperadora 01", "jan"=>$recuperadora01jan, "fev"=>$recuperadora01fev, "mar"=>$recuperadora01mar, "abr"=>$recuperadora01abr, "mai"=>$recuperadora01mai, "jun"=>$recuperadora01jun, "jul"=>$recuperadora01jul, "ago"=>$recuperadora01ago, "set"=>$recuperadora01set, "out"=>$recuperadora01out, "nov"=>$recuperadora01nov, "dez"=>$recuperadora01dez);




		echo json_encode($resultado);
	

?>