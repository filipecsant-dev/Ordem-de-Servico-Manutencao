<?php
ob_start(); session_start();
require '../funcoes/banco/conexao.php';
require '../funcoes/login/login.php';
require '../funcoes/crud/crud.php';
require 'sendmail.php';
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
switch ($acao) {
	//LOGIN
	case 'login':
		$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
			
				if(conectar() != false){
				 	if(login($usuario, $senha)){
				 		

						$_SESSION['logado'] = pegalogin($usuario);
				 	
					}else{
						echo 'logerrado';
					}
				} else {
					echo 'emperro';
				}
		

		break;

		//CADASTRO FUNCIONARIO
		case 'cadastrouser':
			$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
			$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);

			if ($cargo != '0') {
				if(verifuser($usuario)){
					echo 'existente';
				} else {
					if (cadastrouser($usuario,$senha,$cargo)) {
						echo 'cadastrou';
					} else {
						echo 'erro';
					}
				}
			} else{
				echo 'valorerrado';
			}
		break;

		//EXCLUIR
		case 'excluir':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$table = filter_input(INPUT_POST, 'table', FILTER_SANITIZE_STRING);

			if (delete($table,$id)) {
				echo "deletou";
			} else{
				echo "nao deletou";
			}
			
		break;


		//LISTAR FUNCIONARIOS
		case 'listar_fun':
			if (listarfuncionarios()) { 
				$funcionarios = listarfuncionarios();
				foreach ($funcionarios as $fun) {
				?>
					<tr>
		              <td><?php echo $fun->usuario; ?></td>
		              <td><?php if($fun->cargo === '1'){echo 'Operador';}elseif($fun->cargo === '2'){echo 'Mecânica';}elseif($fun->cargo === '3'){echo 'Elétrica';}elseif($fun->cargo === '4'){echo 'Líder';}else if($fun->cargo === '5' and $fun->usuario != "qualidade"){echo 'Supervisor';}else if($fun->cargo === '5' and $fun->usuario === "qualidade"){echo "Inspetor";}else{echo 'Administrador';} ?></td>
		              <td style="width: 200px;"><?php if($fun->cargo != '6'){ ?><button type="button" id="editar_user" data-id="<?php echo $fun->id; ?>" class="btn btn-warning" style="color:#fff;font-size:13px;">Editar</button><button type="button" id="excluir_user" data-id="<?php echo $fun->id; ?>" class="btn btn-danger" style="margin-left: 5px;font-size:13px;">Excluir</button><?php } ?>
		            	</td>
		            </tr>

			<?php
				}
			}
		break;
		
		//FUNCAO EDITAR USUARIO
		case 'edituser':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
			$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);

			if (atualizaruser($id,$usuario,$cargo)) {
				echo "atualizou";
			} else {
				echo "erro";
			}
			
		break;

//--------------------------------------- SOLICITAR SERVICO -------------------------------->
		

		//CADASTRO FUNCIONARIO
		case 'cadastro_servico':
			$solicitante = filter_input(INPUT_POST, 'solicitante', FILTER_SANITIZE_STRING);
			$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
			$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
			$funcao = filter_input(INPUT_POST, 'funcao', FILTER_SANITIZE_STRING);
			$setormaq = filter_input(INPUT_POST, 'setormaq', FILTER_SANITIZE_STRING);
			$maquina = filter_input(INPUT_POST, 'maquina', FILTER_SANITIZE_STRING);
			$setormanu = filter_input(INPUT_POST, 'setormanu', FILTER_SANITIZE_STRING);
			$tipomanu = filter_input(INPUT_POST, 'tipomanu', FILTER_SANITIZE_STRING);
			$falha = filter_input(INPUT_POST, 'falha', FILTER_SANITIZE_STRING);
			$maquinaparada = filter_input(INPUT_POST, 'maquinaparada', FILTER_SANITIZE_STRING);
			$notify = filter_input(INPUT_POST, 'notify', FILTER_SANITIZE_NUMBER_INT);
			$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_STRING);
			$conjunto = filter_input(INPUT_POST, 'conjunto', FILTER_SANITIZE_STRING);

			if ($solicitante === '' || $data === '' || $hora === '' || $funcao === '' || $setormaq === '' || $maquina === '' || $setormanu === '' || $tipomanu === '' || $falha === '' || $maquinaparada === '' || $prioridade === '' || $conjunto === '') {
				
				echo 'faltou';

			} else {
				if (cadastroservico($solicitante,$data,$hora,$funcao,$setormaq,$maquina,$setormanu,$tipomanu,$falha,$maquinaparada, $notify, $prioridade, $conjunto)) {

					if($notify != 0 && $notify != 2){
						notifyprev($notify);
					}

					if($maquinaparada == "Sim"){
						if(notifyusuarios())
						{
								/*
							$notifyusuarios = notifyusuarios();
							foreach ($notifyusuarios as $not) {
							
								$token = $not->token;
							 	$titulo = $maquina." acabou de parar! (".$setormanu.")";
							 	$mensagem = "Motivo: ".$falha;
							 	send_notification($token,$titulo,$mensagem);
							
							}
							*/
						}
						
					}
				} else {
					echo 'erro';
				}
			}
		break;

		//LISTAR PEDIDOS
		case 'listar_pedidos':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				foreach ($pedidos as $ped) {
					if($ped->status === "Aberta"){
				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		            </tr>

			<?php

					}
				}
			}
		break;


		//LISTAR HORAS PARADAS EXT
		case 'listar_horasparadasext':
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


				?>
				<tr>
					<th>Janeiro</th>
	              	<th><center><?php echo $je01 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $je02 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $je03 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $je04 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $je05 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $je06 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $je07 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $je08 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $je09 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $je10 = relatoriocon("2021-01-01","2021-02-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $je01+$je02+$je03+$je04+$je05+$je06+$je07+$je08+$je09+$je10; ?></center></th>
	            </tr>

	            <tr>
					<th>Fevereiro</th>
	              	<th><center><?php echo $fe01 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $fe02 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $fe03 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $fe04 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $fe05 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $fe06 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $fe07 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $fe08 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $fe09 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $fe10 = relatoriocon("2021-02-01","2021-03-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $fe01+$fe02+$fe03+$fe04+$fe05+$fe06+$fe07+$fe08+$fe09+$fe10; ?></center></th>
	             </tr>

	             <tr>
					<th>Março</th>
	              	<th><center><?php echo $me01 =  relatoriocon("2021-03-01","2021-04-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $me02 =  relatoriocon("2021-03-01","2021-04-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $me03 =  relatoriocon("2021-03-01","2021-04-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $me04 = relatoriocon("2021-03-01","2021-04-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $me05 = relatoriocon("2021-03-01","2021-04-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $me06 = relatoriocon("2021-03-01","2021-04-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $me07 = relatoriocon("2021-03-01","2021-04-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $me08 = relatoriocon("2021-03-01","2021-04-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $me09 = relatoriocon("2021-03-01","2021-04-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $me10 = relatoriocon("2021-03-01","2021-04-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $me01+$me02+$me03+$me04+$me05+$me06+$me07+$me08+$me09+$me10; ?></center></th>
	             </tr>

	             <tr>
					<th>Abril</th>
	              	<th><center><?php echo $ae01 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $ae02 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $ae03 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $ae04 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $ae05 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $ae06 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $ae07 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $ae08 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $ae09 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $ae10 = relatoriocon("2021-04-01","2021-05-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $ae01+$ae02+$ae03+$ae04+$ae05+$ae06+$ae07+$ae08+$ae09+$ae10; ?></center></th>
	             </tr>

	             <tr>
					<th>Maio</th>
	              	<th><center><?php echo $mae01 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $mae02 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $mae03 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $mae04 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $mae05 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $mae06 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $mae07 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $mae08 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $mae09 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $mae10 = relatoriocon("2021-05-01","2021-06-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $mae01+$mae02+$mae03+$mae04+$mae05+$mae06+$mae07+$mae08+$mae09+$mae10; ?></center></th>
	              </tr>

	              <tr>
					<th>Junho</th>
	              	<th><center><?php echo $june01 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $june02 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $june03 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $june04 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $june05 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $june06 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $june07 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $june08 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $june09 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $june10 = relatoriocon("2021-06-01","2021-07-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $june01+$june02+$june03+$june04+$june05+$june06+$june07+$june08+$june09+$june10; ?></center></th>
	              </tr>

	              <tr>
					<th>Julho</th>
	              	<th><center><?php echo $jule01 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $jule02 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $jule03 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $jule04 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $jule05 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $jule06 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $jule07 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $jule08 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $jule09 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $jule10 = relatoriocon("2021-07-01","2021-08-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $jule01+$jule02+$jule03+$jule04+$jule05+$jule06+$jule07+$jule08+$jule09+$jule10; ?></center></th>
	              </tr>
	              
	              <tr>
					<th>Agosto</th>
	              	<th><center><?php echo $age01 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $age02 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $age03 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $age04 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $age05 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $age06 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $age07 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $age08 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $age09 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $age10 = relatoriocon("2021-08-01","2021-09-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $age01+$age02+$age03+$age04+$age05+$age06+$age07+$age08+$age09+$age10; ?></center></th>
	              </tr>

	              <tr>
					<th>Setembro</th>
	              	<th><center><?php echo $sete01 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 01") ?></center></th>
	              	<th><center><?php echo $sete02 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $sete03 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $sete04 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $sete05 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $sete06 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $sete07 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $sete08 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $sete09 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $sete10 = relatoriocon("2021-09-01","2021-10-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $sete01+$sete02+$sete03+$sete04+$sete05+$sete06+$sete07+$sete08+$sete09+$sete10; ?></center></th>
	             </tr>

	             <tr>
					<th>Outubro</th>
	              	<th><center><?php echo $oute01 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $oute02 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $oute03 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $oute04 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $oute05 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $oute06 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $oute07 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $oute08 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $oute09 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $oute10 = relatoriocon("2021-10-01","2021-11-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $oute01+$oute02+$oute03+$oute04+$oute05+$oute06+$oute07+$oute08+$oute09+$oute10; ?></center></th>
	              </tr>

	              <tr>
					<th>Novembro</th>
	              	<th><center><?php echo $nove01 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $nove02 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $nove03 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $nove04 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $nove05 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $nove06 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $nove07 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $nove08 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $nove09 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $nove10 = relatoriocon("2021-11-01","2021-12-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $nove01+$nove02+$nove03+$nove04+$nove05+$nove06+$nove07+$nove08+$nove09+$nove10; ?></center></th>
	              </tr>

	              <tr>
					<th>Dezembro</th>
	              	<th><center><?php echo $deze01 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo $deze02 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo $deze03 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo $deze04 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo $deze05 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo $deze06 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo $deze07 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo $deze08 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo $deze09 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo $deze10 = relatoriocon("2021-12-01","2021-01-01", "Extrusora 10"); ?></center></th>
	              	<th><center><?php echo $deze01+$deze02+$deze03+$deze04+$deze05+$deze06+$deze07+$deze08+$deze09+$deze10; ?></center></th>
	            </tr>

			<?php
		break;

		//LISTAR HORAS PARADAS IMP
		case 'listar_horasparadasimp':
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


				?>
				<tr>
					<th>Janeiro</th>
	              	<th><center><?php echo $jimp01 = relatoriocon("2021-01-01","2021-02-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $jimp02 = relatoriocon("2021-01-01","2021-02-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $jimp03 = relatoriocon("2021-01-01","2021-02-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $jimp04 = relatoriocon("2021-01-01","2021-02-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $jimp05 = relatoriocon("2021-01-01","2021-02-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $jimp01+$jimp02+$jimp03+$jimp04+$jimp05; ?></center></th>
	            </tr>

	            <tr>
					<th>Fevereiro</th>
	              	<th><center><?php echo $fimp01 = relatoriocon("2021-02-01","2021-03-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $fimp02 = relatoriocon("2021-02-01","2021-03-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $fimp03 = relatoriocon("2021-02-01","2021-03-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $fimp04 = relatoriocon("2021-02-01","2021-03-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $fimp05 = relatoriocon("2021-02-01","2021-03-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $fimp01+$fimp02+$fimp03+$fimp04+$fimp05; ?></center></th>
	             </tr>

	             <tr>
					<th>Março</th>
	              	<th><center><?php echo $mimp01 = relatoriocon("2021-03-01","2021-04-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $mimp02 = relatoriocon("2021-03-01","2021-04-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $mimp03 = relatoriocon("2021-03-01","2021-04-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $mimp04 = relatoriocon("2021-03-01","2021-04-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $mimp05 = relatoriocon("2021-03-01","2021-04-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $mimp01+$mimp02+$mimp03+$mimp04+$mimp05; ?></center></th>
	             </tr>

	             <tr>
					<th>Abril</th>
	              	<th><center><?php echo $aimp01 = relatoriocon("2021-04-01","2021-05-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $aimp02 = relatoriocon("2021-04-01","2021-05-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $aimp03 = relatoriocon("2021-04-01","2021-05-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $aimp04 = relatoriocon("2021-04-01","2021-05-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $aimp05 = relatoriocon("2021-04-01","2021-05-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $aimp01+$aimp02+$aimp03+$aimp04+$aimp05; ?></center></th>
	             </tr>

	             <tr>
					<th>Maio</th>
	              	<th><center><?php echo $maiimp01 = relatoriocon("2021-05-01","2021-06-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $maiimp02 = relatoriocon("2021-05-01","2021-06-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $maiimp03 = relatoriocon("2021-05-01","2021-06-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $maiimp04 = relatoriocon("2021-05-01","2021-06-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $maiimp05 = relatoriocon("2021-05-01","2021-06-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $maiimp01+$maiimp02+$maiimp03+$maiimp04+$maiimp05; ?></center></th>
	              </tr>

	              <tr>
					<th>Junho</th>
	              	<th><center><?php echo $junimp01 = relatoriocon("2021-06-01","2021-07-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $junimp02 = relatoriocon("2021-06-01","2021-07-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $junimp03 = relatoriocon("2021-06-01","2021-07-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $junimp04 = relatoriocon("2021-06-01","2021-07-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $junimp05 = relatoriocon("2021-06-01","2021-07-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $junimp01+$junimp02+$junimp03+$junimp04+$junimp05; ?></center></th>
	              </tr>

	              <tr>
					<th>Julho</th>
	              	<th><center><?php echo $julimp01 = relatoriocon("2021-07-01","2021-08-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $julimp02 = relatoriocon("2021-07-01","2021-08-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $julimp03 = relatoriocon("2021-07-01","2021-08-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $julimp04 = relatoriocon("2021-07-01","2021-08-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $julimp05 = relatoriocon("2021-07-01","2021-08-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $julimp01+$julimp02+$julimp03+$julimp04+$julimp05; ?></center></th>
	              </tr>
	              
	              <tr>
					<th>Agosto</th>
	              	<th><center><?php echo $agoimp01 = relatoriocon("2021-08-01","2021-09-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $agoimp02 = relatoriocon("2021-08-01","2021-09-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $agoimp03 = relatoriocon("2021-08-01","2021-09-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $agoimp04 = relatoriocon("2021-08-01","2021-09-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $agoimp05 = relatoriocon("2021-08-01","2021-09-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $agoimp01+$agoimp02+$agoimp03+$agoimp04+$agoimp05; ?></center></th>
	              </tr>

	              <tr>
					<th>Setembro</th>
	              	<th><center><?php echo $setimp01 = relatoriocon("2021-09-01","2021-10-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $setimp02 = relatoriocon("2021-09-01","2021-10-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $setimp03 = relatoriocon("2021-09-01","2021-10-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $setimp04 = relatoriocon("2021-09-01","2021-10-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $setimp05 = relatoriocon("2021-09-01","2021-10-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $setimp01+$setimp02+$setimp03+$setimp04+$setimp05; ?></center></th>
	             </tr>

	             <tr>
					<th>Outubro</th>
	              	<th><center><?php echo $outimp01 = relatoriocon("2021-10-01","2021-11-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $outimp02 = relatoriocon("2021-10-01","2021-11-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $outimp03 = relatoriocon("2021-10-01","2021-11-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $outimp04 = relatoriocon("2021-10-01","2021-11-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $outimp05 = relatoriocon("2021-10-01","2021-11-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $outimp01+$outimp02+$outimp03+$outimp04+$outimp05; ?></center></th>
	              </tr>

	              <tr>
					<th>Novembro</th>
	              	<th><center><?php echo $novimp01 = relatoriocon("2021-11-01","2021-12-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $novimp02 = relatoriocon("2021-11-01","2021-12-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $novimp03 = relatoriocon("2021-11-01","2021-12-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $novimp04 = relatoriocon("2021-11-01","2021-12-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $novimp05 = relatoriocon("2021-11-01","2021-12-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $novimp01+$novimp02+$novimp03+$novimp04+$novimp05; ?></center></th>
	              </tr>

	              <tr>
					<th>Dezembro</th>
	              	<th><center><?php echo $dezimp01 = relatoriocon("2021-12-01","2021-01-01", "FP4"); ?></center></th>
	              	<th><center><?php echo $dezimp02 = relatoriocon("2021-12-01","2021-01-01", "FT1"); ?></center></th>
	              	<th><center><?php echo $dezimp03 = relatoriocon("2021-12-01","2021-01-01", "FO1"); ?></center></th>
	              	<th><center><?php echo $dezimp04 = relatoriocon("2021-12-01","2021-01-01", "FO2"); ?></center></th>
	              	<th><center><?php echo $dezimp05 = relatoriocon("2021-12-01","2021-01-01", "FO3"); ?></center></th>
	              	<th><center><?php echo $dezimp01+$dezimp02+$dezimp03+$dezimp04+$dezimp05; ?></center></th>
	            </tr>

			<?php
		break;

		//LISTAR HORAS PARADAS REB
		case 'listar_horasparadasreb':
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


				?>
				<tr>
					<th>Janeiro</th>
	              	<th><center><?php echo $jreb01 = relatoriocon("2021-01-01","2021-02-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $jreb02 = relatoriocon("2021-01-01","2021-02-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $jreb03 = relatoriocon("2021-01-01","2021-02-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $jreb04 = relatoriocon("2021-01-01","2021-02-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $jreb05 = relatoriocon("2021-01-01","2021-02-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $jreb06 = relatoriocon("2021-01-01","2021-02-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $jreb01+$jreb02+$jreb03+$jreb04+$jreb05+$jreb06; ?></center></th>
	            </tr>

	            <tr>
					<th>Fevereiro</th>
	              	<th><center><?php echo $freb01 = relatoriocon("2021-02-01","2021-03-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $freb02 = relatoriocon("2021-02-01","2021-03-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $freb03 = relatoriocon("2021-02-01","2021-03-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $freb04 = relatoriocon("2021-02-01","2021-03-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $freb05 = relatoriocon("2021-02-01","2021-03-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $freb06 = relatoriocon("2021-02-01","2021-03-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $freb01+$freb02+$freb03+$freb04+$freb05+$freb06; ?></center></th>

	             </tr>

	             <tr>
					<th>Março</th>
	              	<th><center><?php echo $mreb01 = relatoriocon("2021-03-01","2021-04-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $mreb02 = relatoriocon("2021-03-01","2021-04-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $mreb03 = relatoriocon("2021-03-01","2021-04-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $mreb04 = relatoriocon("2021-03-01","2021-04-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $mreb05 = relatoriocon("2021-03-01","2021-04-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $mreb06 = relatoriocon("2021-03-01","2021-04-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $mreb01+$mreb02+$mreb03+$mreb04+$mreb05+$mreb06; ?></center></th>
	             </tr>

	             <tr>
					<th>Abril</th>
	              	<th><center><?php echo $areb01 = relatoriocon("2021-04-01","2021-05-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $areb02 = relatoriocon("2021-04-01","2021-05-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $areb03 = relatoriocon("2021-04-01","2021-05-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $areb04 = relatoriocon("2021-04-01","2021-05-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $areb05 = relatoriocon("2021-04-01","2021-05-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $areb06 = relatoriocon("2021-04-01","2021-05-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $areb01+$areb02+$areb03+$areb04+$areb05+$areb06; ?></center></th>
	             </tr>

	             <tr>
					<th>Maio</th>
	              	<th><center><?php echo $maireb01 = relatoriocon("2021-05-01","2021-06-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $maireb02 = relatoriocon("2021-05-01","2021-06-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $maireb03 = relatoriocon("2021-05-01","2021-06-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $maireb04 = relatoriocon("2021-05-01","2021-06-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $maireb05 = relatoriocon("2021-05-01","2021-06-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $maireb06 = relatoriocon("2021-05-01","2021-06-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $maireb01+$maireb02+$maireb03+$maireb04+$maireb05+$maireb06; ?></center></th>
	              </tr>

	              <tr>
					<th>Junho</th>
	              	<th><center><?php echo $junreb01 = relatoriocon("2021-06-01","2021-07-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $junreb02 = relatoriocon("2021-06-01","2021-07-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $junreb03 = relatoriocon("2021-06-01","2021-07-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $junreb04 = relatoriocon("2021-06-01","2021-07-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $junreb05 = relatoriocon("2021-06-01","2021-07-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $junreb06 = relatoriocon("2021-06-01","2021-07-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $junreb01+$junreb02+$junreb03+$junreb04+$junreb05+$junreb06; ?></center></th>
	              </tr>

	              <tr>
					<th>Julho</th>
	              	<th><center><?php echo $julreb01 = relatoriocon("2021-07-01","2021-08-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $julreb02 = relatoriocon("2021-07-01","2021-08-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $julreb03 = relatoriocon("2021-07-01","2021-08-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $julreb04 = relatoriocon("2021-07-01","2021-08-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $julreb05 = relatoriocon("2021-07-01","2021-08-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $julreb06 = relatoriocon("2021-07-01","2021-08-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $julreb01+$julreb02+$julreb03+$julreb04+$julreb05+$julreb06; ?></center></th>
	              </tr>
	              
	              <tr>
					<th>Agosto</th>
	              	<th><center><?php echo $agoreb01 = relatoriocon("2021-08-01","2021-09-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $agoreb02 = relatoriocon("2021-08-01","2021-09-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $agoreb03 = relatoriocon("2021-08-01","2021-09-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $agoreb04 = relatoriocon("2021-08-01","2021-09-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $agoreb05 = relatoriocon("2021-08-01","2021-09-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $agoreb06 = relatoriocon("2021-08-01","2021-09-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $agoreb01+$agoreb02+$agoreb03+$agoreb04+$agoreb05+$agoreb06; ?></center></th>
	              </tr>

	              <tr>
					<th>Setembro</th>
	              	<th><center><?php echo $setreb01 = relatoriocon("2021-09-01","2021-10-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $setreb02 = relatoriocon("2021-09-01","2021-10-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $setreb03 = relatoriocon("2021-09-01","2021-10-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $setreb04 = relatoriocon("2021-09-01","2021-10-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $setreb05 = relatoriocon("2021-09-01","2021-10-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $setreb06 = relatoriocon("2021-09-01","2021-10-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $setreb01+$setreb02+$setreb03+$setreb04+$setreb05+$setreb06; ?></center></th>
	             </tr>

	             <tr>
					<th>Outubro</th>
	              	<th><center><?php echo $outreb01 = relatoriocon("2021-10-01","2021-11-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $outreb02 = relatoriocon("2021-10-01","2021-11-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $outreb03 = relatoriocon("2021-10-01","2021-11-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $outreb04 = relatoriocon("2021-10-01","2021-11-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $outreb05 = relatoriocon("2021-10-01","2021-11-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $outreb06 = relatoriocon("2021-10-01","2021-11-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $outreb01+$outreb02+$outreb03+$outreb04+$outreb05+$outreb06; ?></center></th>
	              </tr>

	              <tr>
					<th>Novembro</th>
	              	<th><center><?php echo $novreb01 = relatoriocon("2021-11-01","2021-12-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $novreb02 = relatoriocon("2021-11-01","2021-12-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $novreb03 = relatoriocon("2021-11-01","2021-12-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $novreb04 = relatoriocon("2021-11-01","2021-12-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $novreb05 = relatoriocon("2021-11-01","2021-12-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $novreb06 = relatoriocon("2021-11-01","2021-12-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $novreb01+$novreb02+$novreb03+$novreb04+$novreb05+$novreb06; ?></center></th>
	              </tr>

	              <tr>
					<th>Dezembro</th>
	              	<th><center><?php echo $dezreb01 = relatoriocon("2021-12-01","2021-01-01", "Rebobinadeira 01"); ?></center></th>
	              	<th><center><?php echo $dezreb02 = relatoriocon("2021-12-01","2021-01-01", "Rebobinadeira 02"); ?></center></th>
	              	<th><center><?php echo $dezreb03 = relatoriocon("2021-12-01","2021-01-01", "Rebobinadeira 03"); ?></center></th>
	              	<th><center><?php echo $dezreb04 = relatoriocon("2021-12-01","2021-01-01", "Rebobinadeira 04"); ?></center></th>
	              	<th><center><?php echo $dezreb05 = relatoriocon("2021-12-01","2021-01-01", "Rebobinadeira 05"); ?></center></th>
	              	<th><center><?php echo $dezreb06 = relatoriocon("2021-12-01","2021-01-01", "Rebobinadeira 06"); ?></center></th>
	              	<th><center><?php echo $dezreb01+$dezreb02+$dezreb03+$dezreb04+$dezreb05+$dezreb06; ?></center></th>
	            </tr>

			<?php
		break;

		//LISTAR HORAS PARADAS CS
		case 'listar_horasparadascs':
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


				?>
				<tr>
					<th>Janeiro</th>
	              	<th><center><?php echo $jcs01 = relatoriocon("2021-01-01","2021-02-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $jcs02 = relatoriocon("2021-01-01","2021-02-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $jcs03 = relatoriocon("2021-01-01","2021-02-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $jcs04 = relatoriocon("2021-01-01","2021-02-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $jcs05 = relatoriocon("2021-01-01","2021-02-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $jcs06 = relatoriocon("2021-01-01","2021-02-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $jcs07 = relatoriocon("2021-01-01","2021-02-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $jcs01+$jcs02+$jcs03+$jcs04+$jcs05+$jcs06+$jcs07; ?></center></th>
	            </tr>

	            <tr>
					<th>Fevereiro</th>
	              	<th><center><?php echo $fcs01 = relatoriocon("2021-02-01","2021-03-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $fcs02 = relatoriocon("2021-02-01","2021-03-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $fcs03 = relatoriocon("2021-02-01","2021-03-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $fcs04 = relatoriocon("2021-02-01","2021-03-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $fcs05 = relatoriocon("2021-02-01","2021-03-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $fcs06 = relatoriocon("2021-02-01","2021-03-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $fcs07 = relatoriocon("2021-02-01","2021-03-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $fcs01+$fcs02+$fcs03+$fcs04+$fcs05+$fcs06+$fcs07; ?></center></th>
	             </tr>

	             <tr>
					<th>Março</th>
	              	<th><center><?php echo $mcs01 = relatoriocon("2021-03-01","2021-04-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $mcs02 = relatoriocon("2021-03-01","2021-04-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $mcs03 = relatoriocon("2021-03-01","2021-04-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $mcs04 = relatoriocon("2021-03-01","2021-04-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $mcs05 = relatoriocon("2021-03-01","2021-04-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $mcs06 = relatoriocon("2021-03-01","2021-04-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $mcs07 = relatoriocon("2021-03-01","2021-04-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $mcs01+$mcs02+$mcs03+$mcs04+$mcs05+$mcs06+$mcs07; ?></center></th>
	             </tr>

	             <tr>
					<th>Abril</th>
	              	<th><center><?php echo $acs01 = relatoriocon("2021-04-01","2021-05-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $acs02 = relatoriocon("2021-04-01","2021-05-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $acs03 = relatoriocon("2021-04-01","2021-05-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $acs04 = relatoriocon("2021-04-01","2021-05-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $acs05 = relatoriocon("2021-04-01","2021-05-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $acs06 = relatoriocon("2021-04-01","2021-05-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $acs07 = relatoriocon("2021-04-01","2021-05-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $acs01+$acs02+$acs03+$acs04+$acs05+$acs06+$acs07; ?></center></th>
	             </tr>

	             <tr>
					<th>Maio</th>
	              	<th><center><?php echo $maics01 = relatoriocon("2021-05-01","2021-06-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $maics02 = relatoriocon("2021-05-01","2021-06-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $maics03 = relatoriocon("2021-05-01","2021-06-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $maics04 = relatoriocon("2021-05-01","2021-06-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $maics05 = relatoriocon("2021-05-01","2021-06-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $maics06 = relatoriocon("2021-05-01","2021-06-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $maics07 = relatoriocon("2021-05-01","2021-06-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $maics01+$maics02+$maics03+$maics04+$maics05+$maics06+$maics07; ?></center></th>
	              </tr>

	              <tr>
					<th>Junho</th>
	              	<th><center><?php echo $juncs01 = relatoriocon("2021-06-01","2021-07-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $juncs02 = relatoriocon("2021-06-01","2021-07-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $juncs03 = relatoriocon("2021-06-01","2021-07-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $juncs04 = relatoriocon("2021-06-01","2021-07-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $juncs05 = relatoriocon("2021-06-01","2021-07-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $juncs06 = relatoriocon("2021-06-01","2021-07-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $juncs07 = relatoriocon("2021-06-01","2021-07-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $juncs01+$juncs02+$juncs03+$juncs04+$juncs05+$juncs06+$juncs07; ?></center></th>
	              </tr>

	              <tr>
					<th>Julho</th>
	              	<th><center><?php echo $julcs01 = relatoriocon("2021-07-01","2021-08-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $julcs02 = relatoriocon("2021-07-01","2021-08-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $julcs03 = relatoriocon("2021-07-01","2021-08-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $julcs04 = relatoriocon("2021-07-01","2021-08-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $julcs05 = relatoriocon("2021-07-01","2021-08-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $julcs06 = relatoriocon("2021-07-01","2021-08-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $julcs07 = relatoriocon("2021-07-01","2021-08-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $julcs01+$julcs02+$julcs03+$julcs04+$julcs05+$julcs06+$julcs07; ?></center></th>
	              </tr>
	              
	              <tr>
					<th>Agosto</th>
	              	<th><center><?php echo $agocs01 = relatoriocon("2021-08-01","2021-09-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $agocs02 = relatoriocon("2021-08-01","2021-09-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $agocs03 = relatoriocon("2021-08-01","2021-09-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $agocs04 = relatoriocon("2021-08-01","2021-09-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $agocs05 = relatoriocon("2021-08-01","2021-09-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $agocs06 = relatoriocon("2021-08-01","2021-09-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $agocs07 = relatoriocon("2021-08-01","2021-09-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $agocs01+$agocs02+$agocs03+$agocs04+$agocs05+$agocs06+$agocs07; ?></center></th>
	              </tr>

	              <tr>
					<th>Setembro</th>
	              	<th><center><?php echo $setcs01 = relatoriocon("2021-09-01","2021-10-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $setcs02 = relatoriocon("2021-09-01","2021-10-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $setcs03 = relatoriocon("2021-09-01","2021-10-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $setcs04 = relatoriocon("2021-09-01","2021-10-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $setcs05 = relatoriocon("2021-09-01","2021-10-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $setcs06 = relatoriocon("2021-09-01","2021-10-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $setcs07 = relatoriocon("2021-09-01","2021-10-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $setcs01+$setcs02+$setcs03+$setcs04+$setcs05+$setcs06+$setcs07; ?></center></th>
	             </tr>

	             <tr>
					<th>Outubro</th>
	              	<th><center><?php echo $outcs01 = relatoriocon("2021-10-01","2021-11-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $outcs02 = relatoriocon("2021-10-01","2021-11-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $outcs03 = relatoriocon("2021-10-01","2021-11-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $outcs04 = relatoriocon("2021-10-01","2021-11-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $outcs05 = relatoriocon("2021-10-01","2021-11-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $outcs06 = relatoriocon("2021-10-01","2021-11-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $outcs07 = relatoriocon("2021-10-01","2021-11-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $outcs01+$outcs02+$outcs03+$outcs04+$outcs05+$outcs06+$outcs07; ?></center></th>
	              </tr>

	              <tr>
					<th>Novembro</th>
	              	<th><center><?php echo $novcs01 = relatoriocon("2021-11-01","2021-12-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $novcs02 = relatoriocon("2021-11-01","2021-12-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $novcs03 = relatoriocon("2021-11-01","2021-12-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $novcs04 = relatoriocon("2021-11-01","2021-12-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $novcs05 = relatoriocon("2021-11-01","2021-12-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $novcs06 = relatoriocon("2021-11-01","2021-12-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $novcs07 = relatoriocon("2021-11-01","2021-12-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $novcs01+$novcs02+$novcs03+$novcs04+$novcs05+$novcs06+$novcs07; ?></center></th>
	              </tr>

	              <tr>
					<th>Dezembro</th>
	              	<th><center><?php echo $dezcs01 = relatoriocon("2021-12-01","2021-01-01", "Corte e Solda 01"); ?></center></th>
	              	<th><center><?php echo $dezcs02 = relatoriocon("2021-12-01","2021-01-01", "Corte e Solda 02"); ?></center></th>
	              	<th><center><?php echo $dezcs03 = relatoriocon("2021-12-01","2021-01-01", "Corte e Solda 03"); ?></center></th>
	              	<th><center><?php echo $dezcs04 = relatoriocon("2021-12-01","2021-01-01", "Corte e Solda 04"); ?></center></th>
	              	<th><center><?php echo $dezcs05 = relatoriocon("2021-12-01","2021-01-01", "Corte e Solda 06"); ?></center></th>
	              	<th><center><?php echo $dezcs06 = relatoriocon("2021-12-01","2021-01-01", "Corte e Solda 07"); ?></center></th>
	              	<th><center><?php echo $dezcs07 = relatoriocon("2021-12-01","2021-01-01", "Corte e Solda 08"); ?></center></th>
	              	<th><center><?php echo $dezcs01+$dezcs02+$dezcs03+$dezcs04+$dezcs05+$dezcs06+$dezcs07; ?></center></th>
	            </tr>

			<?php
		break;



		//LISTAR HORAS PARADAS MIST
		case 'listar_horasparadasmist':
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


				?>
				<tr>
					<th>Janeiro</th>
	              	<th><center><?php echo $jmist01 =  relatoriocon("2021-01-01","2021-02-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $jmist02 =  relatoriocon("2021-01-01","2021-02-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $jmist03 =  relatoriocon("2021-01-01","2021-02-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $jmist04 =  relatoriocon("2021-01-01","2021-02-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $jmist05 =  relatoriocon("2021-01-01","2021-02-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $jmist06 =  relatoriocon("2021-01-01","2021-02-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $jmist01+$jmist02+$jmist03+$jmist04+$jmist05+$jmist06; ?></center></th>
	            </tr>

	            <tr>
					<th>Fevereiro</th>
	              	<th><center><?php echo $fmist01 =  relatoriocon("2021-02-01","2021-03-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $fmist02 =  relatoriocon("2021-02-01","2021-03-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $fmist03 =  relatoriocon("2021-02-01","2021-03-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $fmist04 =  relatoriocon("2021-02-01","2021-03-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $fmist05 =  relatoriocon("2021-02-01","2021-03-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $fmist06 =  relatoriocon("2021-02-01","2021-03-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $fmist01+$fmist02+$fmist03+$fmist04+$fmist05+$fmist06; ?></center></th>
	             </tr>

	             <tr>
					<th>Março</th>
	              	<th><center><?php echo $mmist01 =  relatoriocon("2021-03-01","2021-04-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $mmist02 =  relatoriocon("2021-03-01","2021-04-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $mmist03 =  relatoriocon("2021-03-01","2021-04-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $mmist04 =  relatoriocon("2021-03-01","2021-04-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $mmist05 =  relatoriocon("2021-03-01","2021-04-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $mmist06 =  relatoriocon("2021-03-01","2021-04-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $mmist01+$mmist02+$mmist03+$mmist04+$mmist05+$mmist06; ?></center></th>
	             </tr>

	             <tr>
					<th>Abril</th>
	              	<th><center><?php echo $amist01 =  relatoriocon("2021-04-01","2021-05-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $amist02 =  relatoriocon("2021-04-01","2021-05-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $amist03 =  relatoriocon("2021-04-01","2021-05-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $amist04 =  relatoriocon("2021-04-01","2021-05-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $amist05 =  relatoriocon("2021-04-01","2021-05-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $amist06 =  relatoriocon("2021-04-01","2021-05-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $amist01+$amist02+$amist03+$amist04+$amist05+$amist06; ?></center></th>
	             </tr>

	             <tr>
					<th>Maio</th>
	              	<th><center><?php echo $maimist01 =  relatoriocon("2021-05-01","2021-06-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $maimist02 =  relatoriocon("2021-05-01","2021-06-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $maimist03 =  relatoriocon("2021-05-01","2021-06-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $maimist04 =  relatoriocon("2021-05-01","2021-06-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $maimist05 =  relatoriocon("2021-05-01","2021-06-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $maimist06 =  relatoriocon("2021-05-01","2021-06-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $maimist01+$maimist02+$maimist03+$maimist04+$maimist05+$maimist06; ?></center></th>
	              </tr>

	              <tr>
					<th>Junho</th>
	              	<th><center><?php echo $junmist01 =  relatoriocon("2021-06-01","2021-07-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $junmist02 =  relatoriocon("2021-06-01","2021-07-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $junmist03 =  relatoriocon("2021-06-01","2021-07-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $junmist04 =  relatoriocon("2021-06-01","2021-07-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $junmist05 =  relatoriocon("2021-06-01","2021-07-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $junmist06 =  relatoriocon("2021-06-01","2021-07-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $junmist01+$junmist02+$junmist03+$junmist04+$junmist05+$junmist06; ?></center></th>
	              </tr>

	              <tr>
					<th>Julho</th>
	              	<th><center><?php echo $julmist01 =  relatoriocon("2021-07-01","2021-08-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $julmist02 =  relatoriocon("2021-07-01","2021-08-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $julmist03 =  relatoriocon("2021-07-01","2021-08-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $julmist04 =  relatoriocon("2021-07-01","2021-08-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $julmist05 =  relatoriocon("2021-07-01","2021-08-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $julmist06 =  relatoriocon("2021-07-01","2021-08-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $julmist01+$julmist02+$julmist03+$julmist04+$julmist05+$julmist06; ?></center></th>
	              </tr>
	              
	              <tr>
					<th>Agosto</th>
	              	<th><center><?php echo $agomist01 =  relatoriocon("2021-08-01","2021-09-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $agomist02 =  relatoriocon("2021-08-01","2021-09-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $agomist03 =  relatoriocon("2021-08-01","2021-09-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $agomist04 =  relatoriocon("2021-08-01","2021-09-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $agomist05 =  relatoriocon("2021-08-01","2021-09-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $agomist06 =  relatoriocon("2021-08-01","2021-09-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $agomist01+$agomist02+$agomist03+$agomist04+$agomist05+$agomist06; ?></center></th>
	              </tr>

	              <tr>
					<th>Setembro</th>
	              	<th><center><?php echo $setmist01 =  relatoriocon("2021-09-01","2021-10-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $setmist02 =  relatoriocon("2021-09-01","2021-10-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $setmist03 =  relatoriocon("2021-09-01","2021-10-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $setmist04 =  relatoriocon("2021-09-01","2021-10-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $setmist05 =  relatoriocon("2021-09-01","2021-10-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $setmist06 =  relatoriocon("2021-09-01","2021-10-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $setmist01+$setmist02+$setmist03+$setmist04+$setmist05+$setmist06; ?></center></th>
	             </tr>

	             <tr>
					<th>Outubro</th>
	              	<th><center><?php echo $outmist01 =  relatoriocon("2021-10-01","2021-11-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $outmist02 =  relatoriocon("2021-10-01","2021-11-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $outmist03 =  relatoriocon("2021-10-01","2021-11-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $outmist04 =  relatoriocon("2021-10-01","2021-11-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $outmist05 =  relatoriocon("2021-10-01","2021-11-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $outmist06 =  relatoriocon("2021-10-01","2021-11-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $outmist01+$outmist02+$outmist03+$outmist04+$outmist05+$outmist06; ?></center></th>
	              </tr>

	              <tr>
					<th>Novembro</th>
	              	<th><center><?php echo $novmist01 =  relatoriocon("2021-11-01","2021-12-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $novmist02 =  relatoriocon("2021-11-01","2021-12-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $novmist03 =  relatoriocon("2021-11-01","2021-12-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $novmist04 =  relatoriocon("2021-11-01","2021-12-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $novmist05 =  relatoriocon("2021-11-01","2021-12-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $novmist06 =  relatoriocon("2021-11-01","2021-12-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $novmist01+$novmist02+$novmist03+$novmist04+$novmist05+$novmist06; ?></center></th>
	              </tr>

	              <tr>
					<th>Dezembro</th>
	              	<th><center><?php echo $dezmist01 =  relatoriocon("2021-12-01","2021-01-01", "Misturador 01"); ?></center></th>
	              	<th><center><?php echo $dezmist02 =  relatoriocon("2021-12-01","2021-01-01", "Misturador 02"); ?></center></th>
	              	<th><center><?php echo $dezmist03 =  relatoriocon("2021-12-01","2021-01-01", "Misturador 03"); ?></center></th>
	              	<th><center><?php echo $dezmist04 =  relatoriocon("2021-12-01","2021-01-01", "Misturador 04"); ?></center></th>
	              	<th><center><?php echo $dezmist05 =  relatoriocon("2021-12-01","2021-01-01", "Misturador 05"); ?></center></th>
	              	<th><center><?php echo $dezmist06 =  relatoriocon("2021-12-01","2021-01-01", "Misturador 06"); ?></center></th>
	              	<th><center><?php echo $dezmist01+$dezmist02+$dezmist03+$dezmist04+$dezmist05+$dezmist06; ?></center></th>
	            </tr>

			<?php
		break;

		
/*
		//LISTAR TODOS PEDIDOS
		case 'listar_todospedidos':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				foreach ($pedidos as $ped) {
				?>
					<tr>
		              <th><center>
		              	<button type="button" id="imprimir_pedido" data-id="<?php echo $ped->id; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
		              </center></th>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		            </tr>

			<?php
				}
			}
		break;
*/

		//LISTAR TODOS PEDIDOS
		case 'listar_todosservicos':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				$anopassado = date('Y-m-d', strtotime("-1 years, -1 days"));//16/09/2021
				foreach ($pedidos as $ped) {
					if($ped->tipomanu != 'Preventiva'){
						$osano = date('Y-m-d', strtotime($ped->data));
						if(strtotime($anopassado) < strtotime($osano)){
						
				
					
				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		              <th><center>
		              	<button type="button" id="visualizar_os" data-id="<?php echo $ped->id; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
		              </center></th>
		            </tr>

			<?php	

						
					}
				}
			}
			}
		break;


		//LISTAR TODOS PEDIDOS
		case 'listar_busca':
		$dados = filter_input(INPUT_POST, 'dados', FILTER_SANITIZE_STRING);
		$forma = filter_input(INPUT_POST, 'forma', FILTER_SANITIZE_STRING);

			if (listarbusca($dados,$forma)) { 
				$pedidos = listarbusca($dados,$forma);
				foreach ($pedidos as $ped) {
				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		              <th><center>
		              	<button type="button" id="visualizar_os" data-id="<?php echo $ped->id; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
		              </center></th>
		            </tr>

			<?php
				}
			} else {
				return false;
			}
		break;


		//LISTAR TODOS PEDIDOS
		case 'listar_busca2':
		$dados = filter_input(INPUT_POST, 'dados', FILTER_SANITIZE_STRING);

			if (listarbusca2($dados)) { 
				$pedidos = listarbusca2($dados);
				foreach ($pedidos as $ped) {
				if($ped->status === "Assinatura"){
				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->datafinal)); ?></center></th>
		              <th><center><?php echo $ped->manutentor; ?></center></th>
		              <th><center><?php echo $ped->servico; ?></center></th>
		              <th><center> <button type="button" id="assinaros" data-id="<?php echo $ped->id; ?>" class="btn btn-info" style="color:#fff;font-size:15px;">Assinar</button><img src="img/load2.gif" align="center" id="load" style="width: 25px; height: 25px; float: right; margin-right: 5px; margin-top:5px; display: none;"></center></th>
		            </tr>

			<?php

					}
				}
			} else {
				return false;
			}
		break;

//--------------------------------------- FIM SOLICITAR SERVICO -------------------------------->

//--------------------------------------- REALIZAR SERVICO ----------------------------------------------------------
		//LISTAR SERVICOS PENDENTES
		case 'listar_pedidospendentes':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				if($_SESSION['logado']->cargo === '2'){$setor = 'Mecânica';} else{$setor = 'Elétrica';}
				foreach ($pedidos as $ped) {
					if($ped->status != "Assinatura" && $ped->status != "Fechada" && $ped->tipomanu != "Preventiva" && $ped->aguardparada == 0){
						if($ped->setormanu === $setor || $ped->setormanu === "Eletromecânica"){

				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php if($ped->manutentor2 === null || $ped->manutentor2 === ''){ echo $ped->manutentor;}else{ echo $ped->manutentor.' -> '.$ped->manutentor2;}; ?></center></th>
		              <th><center>

		              	<button type="button" id="editar_prod" <?php if($ped->status === "Aberta"){echo 'data-status="0"'; } if($ped->status === "Em execução"){echo 'data-status="1"'; } ?> data-id="<?php echo $ped->id; ?>"  <?php if($ped->status === "Aberta"){echo 'class="btn btn-warning"'; } if($ped->status === "Em execução"){echo 'class="btn btn-danger"'; } ?> style="color:#fff;font-size:15px; float: left; margin-right: 10px;" data-manu="<?php if($ped->manutentor2 === null){echo '0';}else{echo '1';} ?>">

		              	<?php if($ped->status === "Aberta"){echo 'Iniciar'; } if($ped->status === "Em execução"){echo 'Finalizar'; } ?>
		              		

		              	</button>
		              </center>

		              	<center>
		              	<?php if($ped->status === "Aberta"){ 

		              		$cargof = '0';
		              		if(listarfuncionarios()) { 
								$func = listarfuncionarios();
								foreach($func as $fw){
									if($fw->usuario === "Filipe"){
										$cargof = $fw->cargo;
									}
								}
							}

		              		?>
		              	<button type="button" id="fechar_prod" data-status="<?php echo $cargof; ?>" data-id="<?php echo $ped->id; ?>"  class="btn btn-info" style="color:#fff;font-size:15px; float: left; margin-right: 10px;">Fechar</button>
		              <?php } ?></center>

		              <?php if($ped->status === "Aberta" && $_SESSION['logado']->cargo === "2"){ ?><center>
		              	<button type="button" id="aguard_parada" data-id="<?php echo $ped->id; ?>" data-maq="<?php echo $ped->maquina; ?>" data-obs="<?php echo $ped->falha; ?>"  class="btn btn-dark" style="color:#fff;font-size:15px;float: left;">Aguar. Parada</button>
		              <?php } ?></center>
		            
		              </th>
		            </tr>

			<?php
								//NOTIFY
								if($ped->notify == 0){
									
									atualizarnotify($ped->id);
									
									echo'
									

									<script type="text/javascript">

										var icon = "img/norpack.png";
										var title = "Nova OS: '.$ped->maquina.'";
										var mensagem = "Falha: '.$ped->falha.'";

									    notifyMe(icon, title, mensagem);

									    function notifyMe(icon, title, mensagem, link){
											if(!Notification){
												alert("O navegador que você está utilizando é antigo. Por favor utilize o Chrome!");
												return;
											}

											if(Notification.permission !== "granted"){
												Notification.requestPermission();
											} else {
												var notification = new Notification(title, {
													icon: icon,
													body: mensagem
													});
													
													somativo();						
											}
										}


										
									</script>

										';						
									
							
								}
					
						}

					}
				}
			}
		break;

		//LISTAR SERVICOS PENDENTES
		case 'listar_pedidosaguardparada':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				if($_SESSION['logado']->cargo === '2'){$setor = 'Mecânica';} else{$setor = 'Elétrica';}
				foreach ($pedidos as $ped) {
					if($ped->status != "Assinatura" && $ped->status != "Fechada" && $ped->tipomanu != "Preventiva" && $ped->aguardparada == 1){
						if($ped->setormanu === $setor || $ped->setormanu === "Eletromecânica"){

				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php if($ped->manutentor2 === null || $ped->manutentor2 === ''){ echo $ped->manutentor;}else{ echo $ped->manutentor.' -> '.$ped->manutentor2;}; ?></center></th>
		              <th><center>

		              	<button type="button" id="editar_prod" <?php if($ped->status === "Aberta"){echo 'data-status="0"'; } if($ped->status === "Em execução"){echo 'data-status="1"'; } ?> data-id="<?php echo $ped->id; ?>"  <?php if($ped->status === "Aberta"){echo 'class="btn btn-warning"'; } if($ped->status === "Em execução"){echo 'class="btn btn-danger"'; } ?> style="color:#fff;font-size:15px; float: left; margin-right: 10px;" data-manu="<?php if($ped->manutentor2 === null){echo '0';}else{echo '1';} ?>">

		              	<?php if($ped->status === "Aberta"){echo 'Iniciar'; } if($ped->status === "Em execução"){echo 'Finalizar'; } ?>
		              		

		              	</button>
		              </center>

		              	<center>
		              	<?php if($ped->status === "Aberta"){ 

		              		$cargof = '0';
		              		if(listarfuncionarios()) { 
								$func = listarfuncionarios();
								foreach($func as $fw){
									if($fw->usuario === "Filipe"){
										$cargof = $fw->cargo;
									}
								}
							}

		              		?>
		              	<button type="button" id="fechar_prod" data-status="<?php echo $cargof; ?>" data-id="<?php echo $ped->id; ?>"  class="btn btn-info" style="color:#fff;font-size:15px; float: left; margin-right: 10px;">Fechar</button>
		              <?php } ?></center>
		<?php
		          }
		      }
		  }
		}
		
		break;



		//FECHAR PROD
		case 'fechar_prod':
			$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_NUMBER_INT);

			if (atualizaruser2($cargo)) {
				echo "foi";
			} else {
				echo "erro";
			}

		break;


		//LISTAR SERVICOS PENDENTES
		case 'listar_editserv':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				
				foreach ($pedidos as $ped) {

						//if($ped->setormanu === 'Elétrica'){
					?>
							<tr>
				              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
				              <th><center><?php echo $ped->solicitante; ?></center></th>
				              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
				              <th><center><?php echo $ped->hora; ?></center></th>
				              <th><center><?php echo $ped->setormaq; ?></center></th>
				              <th><center><?php echo $ped->maquina; ?></center></th>
				              <th><center><?php echo $ped->setormanu; ?></center></th>
				              <th><center><?php echo $ped->falha; ?></center></th>
				              <th><center><?php echo $ped->servico; ?></center></th>
				              <th><center><?php echo $ped->pecasubstituida; ?></center></th>
				              <th><center><?php echo $ped->maquinaparada; ?></center></th>
				              <th><center><?php if($ped->manutentor2 === null || $ped->manutentor2 === ''){ echo $ped->manutentor;}else{ echo $ped->manutentor.' -> '.$ped->manutentor2;}; ?></center></th>
				              <th><center><?php echo date('d/m/Y', strtotime($ped->datafinal)); ?></center></th>
					              <th><center><?php echo $ped->horainicial; ?></center></th>
					              <th><center><?php echo $ped->horafinal; ?></center></th>
				              <th><center><?php echo $ped->horaparada; ?></center></th>
				              <th><center><?php echo $ped->hh; ?></center></th>
				              <th><center><button type="button" id="edit_serv" data-id="<?php echo $ped->id; ?>"  class="btn btn-danger" style="color:#fff;font-size:15px;">Alterar              		
				              	</button></center></th>
				            </tr>

						<?php
						//}
	
				}

			}
		break;

		//FUNCAO EDITAR SERVICO PENDENTES
		case 'iniciarserv':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$datafinal = filter_input(INPUT_POST, 'datafinal', FILTER_SANITIZE_STRING);
			$horainicial = filter_input(INPUT_POST, 'horainicial', FILTER_SANITIZE_STRING);
			$manutentor = filter_input(INPUT_POST, 'manutentor', FILTER_SANITIZE_STRING);
			
			if($horainicial === '' || $manutentor === '' || $datafinal === ''){
				echo 'faltou';
			}else {
				if (iniciarserv($id,$datafinal,$horainicial,$manutentor)) {
					echo 'iniciou';
				} else {
					echo 'erro';
				}
			}
			
		break;


		//FUNCAO EDITAR SERVICO PENDENTES
		case 'editarserv':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$os = filter_input(INPUT_POST, 'os', FILTER_SANITIZE_NUMBER_INT);
			$solicitante = filter_input(INPUT_POST, 'solicitante', FILTER_SANITIZE_STRING);
			$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
			$funcao = filter_input(INPUT_POST, 'funcao', FILTER_SANITIZE_STRING);
			$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
			$maquina = filter_input(INPUT_POST, 'maquina', FILTER_SANITIZE_STRING);
			$setormaq = filter_input(INPUT_POST, 'setormaq', FILTER_SANITIZE_STRING);
			$setormanu = filter_input(INPUT_POST, 'setormanu', FILTER_SANITIZE_STRING);
			$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_STRING);
			$falha = filter_input(INPUT_POST, 'falha', FILTER_SANITIZE_STRING);
			$servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);
			$pecasubstituida = filter_input(INPUT_POST, 'pecasubstituida', FILTER_SANITIZE_STRING);
			$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
			$maquinaparada = filter_input(INPUT_POST, 'maquinaparada', FILTER_SANITIZE_STRING);
			$horainicial = filter_input(INPUT_POST, 'horainicial', FILTER_SANITIZE_STRING);
			$horafinal = filter_input(INPUT_POST, 'horafinal', FILTER_SANITIZE_STRING);
			$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
			$assinatura = filter_input(INPUT_POST, 'assinatura', FILTER_SANITIZE_STRING);
			$datafinal = filter_input(INPUT_POST, 'datafinal', FILTER_SANITIZE_STRING);
			$manutentor = filter_input(INPUT_POST, 'manutentor', FILTER_SANITIZE_STRING);
			$manutentor2 = filter_input(INPUT_POST, 'manutentor2', FILTER_SANITIZE_STRING);
			$horaparada = filter_input(INPUT_POST, 'horaparada', FILTER_SANITIZE_STRING);
			$hh = filter_input(INPUT_POST, 'hh', FILTER_SANITIZE_STRING);
			
	
			if (editarserv($id,$os,$solicitante,$data,$funcao, $hora, $maquina,$setormaq,$setormanu,$prioridade,$falha,$servico,$pecasubstituida,$observacao,$maquinaparada,$horainicial,$horafinal,$status,$assinatura,$datafinal,$manutentor,$manutentor2,$horaparada,$hh)) {
				echo 'editou';
			} else {
				echo 'erro';
			}
	
			
		break;



		//FUNCAO EDITAR SERVICO PENDENTES
		case 'finalizarserv':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
			$horainicial = filter_input(INPUT_POST, 'horainicial', FILTER_SANITIZE_STRING);
			$horafinal = filter_input(INPUT_POST, 'horafinal', FILTER_SANITIZE_STRING);
			$manutentor2 = filter_input(INPUT_POST, 'manutentor2', FILTER_SANITIZE_STRING);
			$servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);
			$pecasubstituida = filter_input(INPUT_POST, 'pecasubstituida', FILTER_SANITIZE_STRING);
			$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
			
			if($servico === '' || $datafinal === '' || $horafinal === ''){
				echo 'faltou';
			}else {
				if (finalizarserv($id,$hora,$horainicial,$horafinal,$manutentor2,$servico,$pecasubstituida,$observacao)) {
					echo 'atualizou';
				} else {
					echo 'erro';
				}
			}
			
		break;


		case '2manutentorini':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$horainicial = filter_input(INPUT_POST, 'horainicial', FILTER_SANITIZE_STRING);
			$horafinal = filter_input(INPUT_POST, 'horafinal', FILTER_SANITIZE_STRING);
			$manutentor2 = filter_input(INPUT_POST, 'manutentor2', FILTER_SANITIZE_STRING);
			$horainicial2 = filter_input(INPUT_POST, 'horainicial2', FILTER_SANITIZE_STRING);

			if($horafinal === '' || $manutentor2 === '' || $horainicial2 === ''){
				echo 'faltou';
			}else {
				if (iniciarserv2($id,$horainicial,$horafinal,$manutentor2,$horainicial2)) {
					echo 'atualizou';
				} else {
					echo 'erro';
				}
			}
		break;


		case '2manutentorfin':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
			$horainicial2 = filter_input(INPUT_POST, 'horainicial2', FILTER_SANITIZE_STRING);
			$horafinal2 = filter_input(INPUT_POST, 'horafinal2', FILTER_SANITIZE_STRING);
			$servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);
			$pecasubstituida = filter_input(INPUT_POST, 'pecasubstituida', FILTER_SANITIZE_STRING);
			$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);

			if($horafinal2 === '' || $servico === ''){
				echo 'faltou';
			}else {
				if (finalizarserv2($id,$hora,$horainicial2,$horafinal2,$servico,$pecasubstituida,$observacao)) {
					echo 'atualizou';
				} else {
					echo 'erro';
				}
			}
		break;

//----------------------------------- FIM REALIZAR SERVICO ----------------------------------------------------------

//----------------------------------- CONFIRMAR SERVIÇO ----------------------------------------------------------
	//LISTAR SERVICOS PENDENTES
		case 'listar_confirmarserv':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				foreach ($pedidos as $ped) {
					if($ped->status === "Assinatura"){
				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->datafinal)); ?></center></th>
		              <th><center><?php echo $ped->manutentor; ?></center></th>
		              <th><center><?php echo $ped->servico; ?></center></th>
		              <th><center> <button type="button" id="assinaros" data-id="<?php echo $ped->id; ?>" class="btn btn-info" style="color:#fff;font-size:15px;">Assinar</button><img src="img/load2.gif" align="center" id="load" style="width: 25px; height: 25px; float: right; margin-right: 5px; margin-top:5px; display: none;"></center></th>
		            </tr>

			<?php

					}
				}
			}
		break;


		//LISTAR SERVICOS PENDENTES
		case 'listar_confirmarserv2':
		$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);

			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				foreach ($pedidos as $ped) {
					if($ped->status === "Assinatura"){
						if($ped->setormaq === $area){
							
				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->datafinal)); ?></center></th>
		              <th><center><?php echo $ped->manutentor; ?></center></th>
		              <th><center><?php echo $ped->servico; ?></center></th>
		              <th><center> <button type="button" id="assinaros" data-id="<?php echo $ped->id; ?>" class="btn btn-info" style="color:#fff;font-size:15px;">Assinar</button><img src="img/load2.gif" align="center" id="load" style="width: 25px; height: 25px; float: right; margin-right: 5px; margin-top:5px; display: none;"></center></th>
		            </tr>

			<?php
						
						}

					}
				}
			}
		break;

		//LISTAR SERVICOS PENDENTES
		case 'listar_servadmin':
			if (listarpedidos()) { 
				$pedidos = listarpedidos();
				foreach ($pedidos as $ped) {
				?>
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php echo $ped->status; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->datafinal)); ?></center></th>
		              <th><center><?php echo $ped->manutentor; ?></center></th>
		              <th><center><?php echo $ped->servico; ?></center></th>
		              <th><center> <button type="button" id="excluiros" data-id="<?php echo $ped->id; ?>" class="btn btn-danger" style="color:#fff;font-size:15px;">Excluir</button><img src="img/load2.gif" align="center" id="load" style="width: 25px; height: 25px; float: right; margin-right: 5px; margin-top:5px; display: none;"></center></th>
		            </tr>

			<?php

				}
			}
		break;

		case 'assinaros':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

			if(assinaros($id)){
				echo 'atualizou';
			}else{
				echo 'erro';
			}
		break;

		case 'assinartdos':
			$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);

			if(assinartdos($area)){
				echo 'atualizou';
			}else{
				echo 'erro';
			}
		break;

		case 'excluiros':

			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

			if(delete("dbos", $id)){
				echo 'excluiu';
			} else {
				'erro';
			}
		break;



		case 'aguardparada':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

			if(aguardparada($id)){
				echo 'atualizou';
			}else{
				echo 'erro';
			}
		break;

//--------------------------------------------- PREVENTIVA ---------------------------------

		//LISTAR PEDIDOS
		case 'listar_preventiva':

			if (listarpreventiva()) { 
				$preventiva = listarpreventiva();
				foreach ($preventiva as $prev) {
				?>
					<tr>

					  <th><center><?php if($prev->status != 'Aberta'){ ?><button class="btn btn-warning" id="visu_ficha" data-id="<?php echo $prev->id; ?>" data-maq="<?php echo $prev->maquina; ?>" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button><?php } ?></center></th>

					  <th><center><?php if($prev->status === 'Em execução'){ ?><button class="btn btn-primary" id="visu_ss" data-id="<?php echo $prev->id; ?>" data-setor="<?php echo $prev->setor; ?>" data-maq="<?php echo $prev->maquina; ?>">+</button><?php } ?></center></th>
					  

					  <th><center><?php echo $prev->setormanu; ?></center></th>
		              <th><center><?php echo $prev->maquina; ?></center></th>
		              <th><center><?php echo $prev->falha; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($prev->data)); ?></center></th>
		              <th><center><?php if($prev->datafinal === NULL){echo '-';}else{echo date('d/m/Y', strtotime($prev->datafinal));} ?></center></th>
		              <th><center><?php echo $prev->status; ?></center></th>

		              <th><center>
		              <?php if($prev->status != 'Finalizado'){ ?>
		        	  
		        	  <button type="button" id="add_ss" data-id="<?php echo $prev->id; ?>" data-setor="<?php echo $prev->setormaq; ?>" data-maq="<?php echo $prev->maquina; ?>"  class="btn btn-warning" style="color:#fff;font-size:15px; margin-right: 10px; float: left;">Nova SS</button></center>

		        	  <?php if($prev->status != 'Aberta'){ ?>

		               <center><button type="button" id="finalizar_prev1" data-id="<?php echo $prev->id; ?>"  class="btn btn-danger" style="color:#fff;font-size:15px; float: left; ">Finalizar   

		               </button>

		               <?php 
		               		}
		           	   	}
		               ?>
		               <img src="img/load2.gif" align="center" id="load" style="width: 25px; height: 25px; float: left; margin-left: 10px; margin-right: 5px; margin-top:5px; display: none;"></center></th>

		            </tr>

			<?php

				}
			}
		break;

		case 'listaprev_ss':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			?>
			<div class="table-responsive">
    			<table class="table table-striped table-sm">

    				<tr>
		              <th><center>SS</center></th>
		              <th><center>Solicitante</center></th>
		              <th><center>Data</center></th>
		              <th><center>Hora</center></th>
		              <th><center>Função</center></th>
		              <th><center>Setor Máquina</center></th>
		              <th><center>Máquina</center></th>
		              <th><center>Setor Manutenção</center></th>
		              <th><center>Tipo Manutenção</center></th>
		              <th><center>Falha</center></th>
		              <th><center>Maquina Parada</center></th>
		              <th><center>Manutentor</center></th>
		              <th><center>Ação</center></th>
		            </tr>
			<?php
			if (listarpedidos()) { 
				$pedidos = listarpedidos();

				foreach ($pedidos as $ped) {
					if($ped->notify === $id){
				?>
				
					<tr>
		              <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
		              <th><center><?php echo $ped->solicitante; ?></center></th>
		              <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
		              <th><center><?php echo $ped->hora; ?></center></th>
		              <th><center><?php echo $ped->funcao; ?></center></th>
		              <th><center><?php echo $ped->setormaq; ?></center></th>
		              <th><center><?php echo $ped->maquina; ?></center></th>
		              <th><center><?php echo $ped->setormanu; ?></center></th>
		              <th><center><?php echo $ped->tipomanu; ?></center></th>
		              <th><center><?php echo $ped->falha; ?></center></th>
		              <th><center><?php echo $ped->maquinaparada; ?></center></th>
		              <th><center><?php if($ped->manutentor2 === null || $ped->manutentor2 === ''){ echo $ped->manutentor;}else{ echo $ped->manutentor.' -> '.$ped->manutentor2;}; ?></center></th>
		              <th><center>
		              	<?php if($ped->status != 'Assinatura'){ ?>
		              	<button type="button" id="editar_prod" <?php if($ped->status === "Aberta"){echo 'data-status="0"'; } if($ped->status === "Em execução"){echo 'data-status="1"'; } ?> data-id="<?php echo $ped->id; ?>"  <?php if($ped->status === "Aberta"){echo 'class="btn btn-warning"'; } if($ped->status === "Em execução"){echo 'class="btn btn-danger"'; } ?> style="color:#fff;font-size:15px;" data-manu="<?php if($ped->manutentor2 === null){echo '0';}else{echo '1';} ?>">

		              	<?php if($ped->status === "Aberta"){echo 'Iniciar'; } if($ped->status === "Em execução"){echo 'Finalizar'; } ?>
		              		

		              	</button>
		              <?php } ?>
		              </center></th>
		            </tr>
		        

			<?php
					}		

				}
			}
			?>
			</table>
		    </div>
			<?php
		break;

		//CADASTRO FUNCIONARIO
		case 'cadastro_preventiva':
			$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_STRING);
			$maquina = filter_input(INPUT_POST, 'maquina', FILTER_SANITIZE_STRING);
			$motivo = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_STRING);
			$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);

			$data1 = date('d/m/Y', strtotime($data));
			

			if ($setor === '' || $maquina === '' || $motivo === '' || $data === '') {
				
				echo 'faltou';

			} else {
				if (cadastropreventiva($setor,$maquina,$motivo,$data1)) {
					/*if(notifyusuarios())
					{
						$notifyusuarios = notifyusuarios();
						// foreach ($notifyusuarios as $not) {
						// 	if($not->usuario === "Filipe"){
						// 		$token = $not->token;
						// 		$titulo = "Preventiva da ".$maquina." para avaliação!";
						// 		$mensagem = "Agendada para o dia: ".$data1.".\nMotivo: ".$motivo.".";
						// 		send_notification($token,$titulo,$mensagem);
						// 	}
						// }

						sendmail($maquina,$data1,$motivo);
					}*/
					

				} else {
					echo 'erro';
				}
			}
		break;


		case 'finalizar_prev2':
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$manutentor = filter_input(INPUT_POST, 'manutentor', FILTER_SANITIZE_STRING);
			$manutentor2 = filter_input(INPUT_POST, 'manutentor2', FILTER_SANITIZE_STRING);
			$data = filter_input(INPUT_POST, 'datafinal', FILTER_SANITIZE_STRING);
			$horainicial = filter_input(INPUT_POST, 'horainicial', FILTER_SANITIZE_STRING);
			$horafinal = filter_input(INPUT_POST, 'horafinal', FILTER_SANITIZE_STRING);


			if(finalizar_prev($id, $manutentor, $manutentor2, $data, $horainicial, $horafinal)){
				echo 'finalizado';
			}else{
				echo 'erro';
			}
		break;

	//ERRO
	default:
		echo 'Erro';
		break;
}
ob_end_flush();