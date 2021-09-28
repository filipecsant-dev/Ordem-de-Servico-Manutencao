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
		$db = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
			
			if($db != ''){
				if(conectar($db) != false){
				 	if(login($usuario, $senha, $db)){
				 		if(date('Y-m-d') >= '2021-01-02')
				 		{
				 			echo 'dados';
				 		}else{

							$_SESSION['logado'] = pegalogin($usuario, $db);
				 		}
					}else{
						echo 'logerrado';
					}
				} else {
					echo 'emperro';
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
			$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_STRING);

			if ($solicitante === '' || $data === '' || $hora === '' || $funcao === '' || $setormaq === '' || $maquina === '' || $setormanu === '' || $tipomanu === '' || $falha === '' || $maquinaparada === '' ||$prioridade === '') {
				
				echo 'faltou';

			} else {
				if (cadastroservico($solicitante,$data,$hora,$funcao,$setormaq,$maquina,$setormanu,$tipomanu,$falha,$maquinaparada, $prioridade)) {
					if($maquinaparada == "Sim"){
						if(notifyusuarios())
						{
				
							$notifyusuarios = notifyusuarios();
							foreach ($notifyusuarios as $not) {
								
									$token = $not->token;
									$titulo = $maquina." acabou de parar!";
									$mensagem = "Motivo: ".$falha;
									send_notification($token,$titulo,$mensagem);
						
							}
							
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


		//LISTAR PEDIDOS
		case 'listar_horasparadas':
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
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-01-01","2020-02-01", "Extrusora 10"); ?></center></th>
	            </tr>

	            <tr>
					<th>Fevereiro</th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-02-01","2020-03-01", "Extrusora 10"); ?></center></th>
	             </tr>

	             <tr>
					<th>Março</th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-03-01","2020-04-01", "Extrusora 10"); ?></center></th>
	             </tr>

	             <tr>
					<th>Abril</th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-04-01","2020-05-01", "Extrusora 10"); ?></center></th>
	             </tr>

	             <tr>
					<th>Maio</th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-05-01","2020-06-01", "Extrusora 10"); ?></center></th>
	              </tr>

	              <tr>
					<th>Junho</th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-06-01","2020-07-01", "Extrusora 10"); ?></center></th>
	              </tr>

	              <tr>
					<th>Julho</th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-07-01","2020-08-01", "Extrusora 10"); ?></center></th>
	              </tr>
	              
	              <tr>
					<th>Agosto</th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-08-01","2020-09-01", "Extrusora 10"); ?></center></th>
	              </tr>

	              <tr>
					<th>Setembro</th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-09-01","2020-10-01", "Extrusora 10"); ?></center></th>
	             </tr>

	             <tr>
					<th>Outubro</th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-10-01","2020-11-01", "Extrusora 10"); ?></center></th>
	              </tr>

	              <tr>
					<th>Novembro</th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-11-01","2020-12-01", "Extrusora 10"); ?></center></th>
	              </tr>

	              <tr>
					<th>Dezembro</th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 01"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 02"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 03"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 04"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 05"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 06"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 07"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 08"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 09"); ?></center></th>
	              	<th><center><?php echo relatoriocon("2020-12-01","2021-01-01", "Extrusora 10"); ?></center></th>
	            </tr>

			<?php
		break;

		

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


		//LISTAR TODOS PEDIDOS
		case 'listar_todosservicos':
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
		              <th><center>
		              	<button type="button" id="visualizar_os" data-id="<?php echo $ped->id; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
		              </center></th>
		            </tr>

			<?php
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
					if($ped->status != "Assinatura" && $ped->status != "Fechada"){
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
		              <th><center><?php if($ped->manutentor2 === null){ echo $ped->manutentor;}else{ echo $ped->manutentor.' -> '.$ped->manutentor2;}; ?></center></th>
		              <th><center><button type="button" id="editar_prod" <?php if($ped->status === "Aberta"){echo 'data-status="0"'; } if($ped->status === "Em execução"){echo 'data-status="1"'; } ?> data-id="<?php echo $ped->id; ?>"  <?php if($ped->status === "Aberta"){echo 'class="btn btn-warning"'; } if($ped->status === "Em execução"){echo 'class="btn btn-danger"'; } ?> style="color:#fff;font-size:15px;" data-manu="<?php if($ped->manutentor2 === null){echo '0';}else{echo '1';} ?>">

		              	<?php if($ped->status === "Aberta"){echo 'Iniciar'; } if($ped->status === "Em execução"){echo 'Finalizar'; } ?>
		              		

		              	</button></center></th>
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
		case 'listar_editserv':
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
		              <th><center><?php if($ped->manutentor2 === null){ echo $ped->manutentor;}else{ echo $ped->manutentor.' -> '.$ped->manutentor2;}; ?></center></th>
		              <th><center><button type="button" id="edit_serv" data-id="<?php echo $ped->id; ?>"  class="btn btn-danger" style="color:#fff;font-size:15px;">Alterar              		
		              	</button></center></th>
		            </tr>

			<?php
						
					
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
			$datafinal = filter_input(INPUT_POST, 'datafinal', FILTER_SANITIZE_STRING);
			$manutentor = filter_input(INPUT_POST, 'manutentor', FILTER_SANITIZE_STRING);
			$manutentor2 = filter_input(INPUT_POST, 'manutentor2', FILTER_SANITIZE_STRING);
			
	
			if (editarserv($id,$solicitante,$data,$funcao, $hora, $maquina,$setormaq,$setormanu,$prioridade,$falha,$servico,$pecasubstituida,$observacao,$maquinaparada,$horainicial,$horafinal,$status,$datafinal,$manutentor,$manutentor2)) {
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
		              <th><center> <input type="checkbox" name="checkbox[]" id="checkbox" value="<?php echo $ped->id; ?>" style="margin-left:10px;width:30px; height:30px;" /></center></th>
		            </tr>

			<?php

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
		if(isset($_POST['checkbox'])){
		    $checkbox = $_POST['checkbox'];

		    foreach ($checkbox as $check) {
		        if(assinaros($check)){
					echo 'atualizou';
				}else{
					echo 'erro';
				}
		    }
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

//--------------------------------------------- PREVENTIVA ---------------------------------

		//LISTAR PEDIDOS
		case 'listar_preventiva':
			if (listarpreventiva()) { 
				$preventiva = listarpreventiva();
				foreach ($preventiva as $prev) {
				?>
					<tr>
		              <th><center><?php echo $prev->maquina; ?></center></th>
		              <th><center><?php echo $prev->motivo; ?></center></th>
		              <th><center><?php echo $prev->data; ?></center></th>
		              <th><center><?php echo $prev->status; ?></center></th>
		            </tr>

			<?php

				}
			}
		break;

		//CADASTRO FUNCIONARIO
		case 'cadastro_preventiva':
			$maquina = filter_input(INPUT_POST, 'maquina', FILTER_SANITIZE_STRING);
			$motivo = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_STRING);
			$data= filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);

			$data1 = date('d/m/Y', strtotime($data));
			

			if ($maquina === '' || $motivo === '' || $data === '') {
				
				echo 'faltou';

			} else {
				if (cadastropreventiva($maquina,$motivo,$data1)) {
					if(notifyusuarios())
					{
						$notifyusuarios = notifyusuarios();
						foreach ($notifyusuarios as $not) {
							if($not->usuario === "Filipe"){
								$token = $not->token;
								$titulo = "Preventiva da ".$maquina." para avaliação!";
								$mensagem = "Agendada para o dia: ".$data1.".\nMotivo: ".$motivo.".";
								send_notification($token,$titulo,$mensagem);
							}
						}

						sendmail($maquina,$data1,$motivo);
					}
				} else {
					echo 'erro';
				}
			}
		break;

	//ERRO
	default:
		echo 'Erro';
		break;
}
ob_end_flush();