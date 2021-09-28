<?php

function cadastrouser($usuario,$senha,$cargo){
	
	$pdo = conectar();
	

	try{
		$cadastro = $pdo->prepare("INSERT INTO usuarios (usuario, senha, cargo, empresa, senhaapp, token) VALUES (?,?,?,?,?,'0')");
		$cadastro->bindValue(1, $usuario, PDO::PARAM_STR);
		$cadastro->bindValue(2, md5(strrev($senha)), PDO::PARAM_STR);
		$cadastro->bindValue(3, $cargo, PDO::PARAM_STR);
		$cadastro->bindValue(4, $empresa, PDO::PARAM_STR);
		$cadastro->bindValue(5, md5($senha), PDO::PARAM_STR);
		$cadastro->execute();

		if($cadastro->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function verifuser($usuario){
	
	$pdo = conectar();

	try{
		$verifuser = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
		$verifuser->bindValue(1,$usuario,PDO::PARAM_STR);
		$verifuser->execute();

		if($verifuser->rowCount() == 1):
			return true;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


function listarfuncionarios(){
	
	$pdo = conectar();

	try{
		$listarfun = $pdo->query("SELECT * FROM usuarios");

		if($listarfun->rowCount() > 0):
			return $listarfun->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function edituser($id){
	
	$pdo = conectar();

	try{
		$edituser = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
		$edituser->bindValue(1,$id,PDO::PARAM_INT);
		$edituser->execute();

		if($edituser->rowCount() > 0):
			return $edituser->fetch(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function atualizaruser($id,$usuario,$cargo){
	
	$pdo = conectar();

	try{
		$atualizaruser = $pdo->prepare("UPDATE usuarios SET usuario=?, cargo=? WHERE id=?");
		$atualizaruser->bindValue(1,$usuario,PDO::PARAM_STR);
		$atualizaruser->bindValue(2,$cargo,PDO::PARAM_STR);
		$atualizaruser->bindValue(3,$id,PDO::PARAM_INT);
		$atualizaruser->execute();

		if($atualizaruser->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}


function atualizaruser2($cargo){
	
	$pdo = conectar();

	try{
		$atualizaruser2 = $pdo->prepare("UPDATE usuarios SET cargo=? WHERE usuario='Filipe'");
		$atualizaruser2->bindValue(1,$cargo,PDO::PARAM_INT);
		$atualizaruser2->execute();

		if($atualizaruser2->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}


function delete($table,$id){
	
	$pdo = conectar();

	try{
		$deleteuser = $pdo->prepare("DELETE FROM $table WHERE id=?");
		$deleteuser->bindValue(1,$id,PDO::PARAM_INT);
		$deleteuser->execute();

		if($deleteuser->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


function notifyprev($notify){
	
	$pdo = conectar();

	try{
		$atualizarnotify = $pdo->prepare("UPDATE dbos SET status='Em execução' WHERE id=?");
		$atualizarnotify->bindValue(1, $notify, PDO::PARAM_INT);
		$atualizarnotify->execute();

		if($atualizarnotify->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}
function cadastroservico($solicitante,$data,$hora,$funcao,$setormaq,$maquina,$setormanu,$tipomanu,$falha,$maquinaparada,$notify,$prioridade,$conjunto){
	
	$pdo = conectar();



	
	try{
	
			$cadastro = $pdo->prepare("INSERT INTO dbos (solicitante, data, hora, funcao, setormaq, maquina, setormanu, tipomanu, falha, maquinaparada, status, notify, prioridade, codigo) VALUES (?,?,?,?,?,?,?,?,?,?,'Aberta',?, ?, ?)");
			$cadastro->bindValue(1, $solicitante, PDO::PARAM_STR);
			$cadastro->bindValue(2, $data, PDO::PARAM_STR);
			$cadastro->bindValue(3, $hora, PDO::PARAM_STR);
			$cadastro->bindValue(4, $funcao, PDO::PARAM_STR);
			$cadastro->bindValue(5, $setormaq, PDO::PARAM_STR);
			$cadastro->bindValue(6, $maquina, PDO::PARAM_STR);
			$cadastro->bindValue(7, $setormanu, PDO::PARAM_STR);
			$cadastro->bindValue(8, $tipomanu, PDO::PARAM_STR);
			$cadastro->bindValue(9, $falha, PDO::PARAM_STR);
			$cadastro->bindValue(10, $maquinaparada, PDO::PARAM_STR);
			$cadastro->bindValue(11, $notify, PDO::PARAM_INT);
			$cadastro->bindValue(12, $prioridade, PDO::PARAM_STR);
			$cadastro->bindValue(13, $conjunto, PDO::PARAM_STR);
			$cadastro->execute();
		

		if($cadastro->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}

function listarpedidos(){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos ORDER BY id DESC");

		if($listarpedidos->rowCount() > 0):
			return $listarpedidos->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function listarpedidos3($id){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos WHERE notify=$id AND status='Assinatura' ORDER BY id DESC");

		if($listarpedidos->rowCount() > 0):
			return $listarpedidos->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


function listarbusca($id,$forma){
	
	$pdo = conectar();

	if($forma === "manu"){
		try{

			$listarbusca = $pdo->prepare("SELECT * FROM dbos WHERE manutentor = ? ORDER BY id DESC");
			$listarbusca->bindValue(1, $id, PDO::PARAM_STR);
			$listarbusca->execute();

			if($listarbusca->rowCount() > 0):
				return $listarbusca->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	} else if($forma === "maq"){
		try{

			$listarbusca = $pdo->prepare("SELECT * FROM dbos WHERE maquina = ? ORDER BY id DESC");
			$listarbusca->bindValue(1, $id, PDO::PARAM_STR);
			$listarbusca->execute();

			if($listarbusca->rowCount() > 0):
				return $listarbusca->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	} else if($forma === "status"){
		try{

			$listarbusca = $pdo->prepare("SELECT * FROM dbos WHERE status = ? ORDER BY id DESC");
			$listarbusca->bindValue(1, $id, PDO::PARAM_STR);
			$listarbusca->execute();

			if($listarbusca->rowCount() > 0):
				return $listarbusca->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	} else if($forma === "parada"){
		try{

			$listarbusca = $pdo->prepare("SELECT * FROM dbos WHERE maquinaparada = ? ORDER BY id DESC");
			$listarbusca->bindValue(1, $id, PDO::PARAM_STR);
			$listarbusca->execute();

			if($listarbusca->rowCount() > 0):
				return $listarbusca->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	} else {
		try{

			$listarbusca = $pdo->prepare("SELECT * FROM dbos WHERE id = ? ORDER BY id DESC");
			$listarbusca->bindValue(1, $id, PDO::PARAM_INT);
			$listarbusca->execute();

			if($listarbusca->rowCount() > 0):
				return $listarbusca->fetchAll(PDO::FETCH_OBJ);
			else:
				return FALSE;
			endif;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	
}


function listarbusca2($id){
	
	$pdo = conectar();

	
	try{

		$listarbusca = $pdo->prepare("SELECT * FROM dbos WHERE setormaq = ? ORDER BY id DESC");
		$listarbusca->bindValue(1, $id, PDO::PARAM_STR);
		$listarbusca->execute();

		if($listarbusca->rowCount() > 0):
			return $listarbusca->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

	
}

function listarpedidos2(){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos ORDER BY data DESC, maquinaparada='Sim' DESC");

		if($listarpedidos->rowCount() > 0):
			return $listarpedidos->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}



function editprod($id){
	
	$pdo = conectar();

	try{
		$editprod = $pdo->prepare("SELECT * FROM dbos WHERE id = ?");
		$editprod->bindValue(1,$id,PDO::PARAM_INT);
		$editprod->execute();

		if($editprod->rowCount() > 0):
			return $editprod->fetch(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function iniciarserv($id,$datafinal,$horainicial,$manutentor){
	
	$pdo = conectar();


	try{
		$atualizarprod = $pdo->prepare("UPDATE dbos SET status='Em execução', datafinal=?, horainicial=?, manutentor=? WHERE id=?");
		$atualizarprod->bindValue(1,$datafinal,PDO::PARAM_STR);
		$atualizarprod->bindValue(2,$horainicial,PDO::PARAM_STR);
		$atualizarprod->bindValue(3,$manutentor,PDO::PARAM_STR);
		$atualizarprod->bindValue(4,$id,PDO::PARAM_INT);
		$atualizarprod->execute();

		if($atualizarprod->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}

function finalizarserv($id,$hora,$horainicial,$horafinal,$manutentor2,$servico,$pecasubstituida,$observacao){
	
	$pdo = conectar();

	$hh = gmdate('H:i', abs( strtotime( $horafinal ) - strtotime( $horainicial ) ) );
	$horaparada = gmdate('H:i', abs( strtotime( $horafinal ) - strtotime( $hora ) ) );


	try{
		$atualizarprod = $pdo->prepare("UPDATE dbos SET status='Assinatura', horafinal=?, manutentor2=?, servico=?, pecasubstituida=?, hh=?, horaparada=?, observacao=? WHERE id=?");
		$atualizarprod->bindValue(1,$horafinal,PDO::PARAM_STR);
		$atualizarprod->bindValue(2,$manutentor2,PDO::PARAM_STR);
		$atualizarprod->bindValue(3,$servico,PDO::PARAM_STR);
		$atualizarprod->bindValue(4,$pecasubstituida,PDO::PARAM_STR);
		$atualizarprod->bindValue(5,$hh,PDO::PARAM_STR);
		$atualizarprod->bindValue(6,$horaparada,PDO::PARAM_STR);
		$atualizarprod->bindValue(7,$observacao,PDO::PARAM_STR);
		$atualizarprod->bindValue(8,$id,PDO::PARAM_INT);
		$atualizarprod->execute();

		if($atualizarprod->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}


function iniciarserv2($id,$horainicial,$horafinal,$manutentor2,$horainicial2){
	
	$pdo = conectar();

	$hh = gmdate('H:i', abs( strtotime( $horafinal ) - strtotime( $horainicial ) ) );


	try{
		$atualizarprod = $pdo->prepare("UPDATE dbos SET horafinal=?, manutentor2=?, horainicial2=?, hh=? WHERE id=?");
		$atualizarprod->bindValue(1,$horafinal,PDO::PARAM_STR);
		$atualizarprod->bindValue(2,$manutentor2,PDO::PARAM_STR);
		$atualizarprod->bindValue(3,$horainicial2,PDO::PARAM_STR);
		$atualizarprod->bindValue(4,$hh,PDO::PARAM_STR);
		$atualizarprod->bindValue(5,$id,PDO::PARAM_INT);
		$atualizarprod->execute();

		if($atualizarprod->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}


function finalizarserv2($id,$hora,$horainicial2,$horafinal2,$servico,$pecasubstituida,$observacao){
	
	$pdo = conectar();

	$hh2 = gmdate('H:i', abs( strtotime( $horafinal2 ) - strtotime( $horainicial2 ) ) );
	$horaparada = gmdate('H:i', abs( strtotime( $horafinal2 ) - strtotime( $hora ) ) );


	try{
		$atualizarprod = $pdo->prepare("UPDATE dbos SET status='Assinatura', horainicial2=?, horafinal2=?, servico=?, pecasubstituida=?, hh2=?, horaparada=?, observacao=? WHERE id=?");
		$atualizarprod->bindValue(1,$horainicial2,PDO::PARAM_STR);
		$atualizarprod->bindValue(2,$horafinal2,PDO::PARAM_STR);
		$atualizarprod->bindValue(3,$servico,PDO::PARAM_STR);
		$atualizarprod->bindValue(4,$pecasubstituida,PDO::PARAM_STR);
		$atualizarprod->bindValue(5,$hh2,PDO::PARAM_STR);
		$atualizarprod->bindValue(6,$horaparada,PDO::PARAM_STR);
		$atualizarprod->bindValue(7,$observacao,PDO::PARAM_STR);
		$atualizarprod->bindValue(8,$id,PDO::PARAM_INT);
		$atualizarprod->execute();

		if($atualizarprod->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}

function editarserv($id,$os,$solicitante,$data,$funcao, $hora, $maquina,$setormaq,$setormanu,$prioridade,$falha,$servico,$pecasubstituida,$observacao,$maquinaparada,$horainicial,$horafinal,$status,$assinatura,$datafinal,$manutentor,$manutentor2,$horaparada,$hh){
	
	$pdo = conectar();

	if($status === 'Aberta'){
		$horaparada = '00:00';
		$hh = '00:00';
	}


	try{
		$atualizarprod = $pdo->prepare("UPDATE dbos SET id=?, solicitante=?, data=?, funcao=?, hora=?, maquina=?, setormaq=?,setormanu=?,prioridade=?,falha=?,servico=?,pecasubstituida=?,observacao=?,maquinaparada=?,horainicial=?,horafinal=?,status=?, assinatura=?, datafinal=?,manutentor=?,manutentor2=?, horaparada=?, hh=? WHERE id=?");
		$atualizarprod->bindValue(1,$os,PDO::PARAM_INT);
		$atualizarprod->bindValue(2,$solicitante,PDO::PARAM_STR);
		$atualizarprod->bindValue(3,$data,PDO::PARAM_STR);
		$atualizarprod->bindValue(4,$funcao,PDO::PARAM_STR);
		$atualizarprod->bindValue(5,$hora,PDO::PARAM_STR);
		$atualizarprod->bindValue(6,$maquina,PDO::PARAM_STR);
		$atualizarprod->bindValue(7,$setormaq,PDO::PARAM_STR);
		$atualizarprod->bindValue(8,$setormanu,PDO::PARAM_STR);
		$atualizarprod->bindValue(9,$prioridade,PDO::PARAM_STR);
		$atualizarprod->bindValue(10,$falha,PDO::PARAM_STR);
		$atualizarprod->bindValue(11,$servico,PDO::PARAM_STR);
		$atualizarprod->bindValue(12,$pecasubstituida,PDO::PARAM_STR);
		$atualizarprod->bindValue(13,$observacao,PDO::PARAM_STR);
		$atualizarprod->bindValue(14,$maquinaparada,PDO::PARAM_STR);
		$atualizarprod->bindValue(15,$horainicial,PDO::PARAM_STR);
		$atualizarprod->bindValue(16,$horafinal,PDO::PARAM_STR);
		$atualizarprod->bindValue(17,$status,PDO::PARAM_STR);
		$atualizarprod->bindValue(18,$assinatura,PDO::PARAM_STR);
		$atualizarprod->bindValue(19,$datafinal,PDO::PARAM_STR);
		$atualizarprod->bindValue(20,$manutentor,PDO::PARAM_STR);
		$atualizarprod->bindValue(21,$manutentor2,PDO::PARAM_STR);
		$atualizarprod->bindValue(22,$horaparada,PDO::PARAM_STR);
		$atualizarprod->bindValue(23,$hh,PDO::PARAM_STR);
		$atualizarprod->bindValue(24,$id,PDO::PARAM_INT);
		$atualizarprod->execute();

		if($atualizarprod->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}


function assinaros($id){
	
	$pdo = conectar();

	$usuario = $_SESSION['logado']->usuario;

	try{
		$assinaros = $pdo->prepare("UPDATE dbos SET status='Fechada', assinatura=? WHERE id=?");
		$assinaros->bindValue(1,$usuario,PDO::PARAM_STR);
		$assinaros->bindValue(2,$id,PDO::PARAM_INT);
		$assinaros->execute();

		if($assinaros->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}

function assinartdos($area){
	
	$pdo = conectar();

	$usuario = $_SESSION['logado']->usuario;

	try{
		$assinaros = $pdo->prepare("UPDATE dbos SET status='Fechada', assinatura=? WHERE setormaq=? AND status='Assinatura'");
		$assinaros->bindValue(1,$usuario,PDO::PARAM_STR);
		$assinaros->bindValue(2,$area,PDO::PARAM_STR);
		$assinaros->execute();

		if($assinaros->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}



function aguardparada($id){
	
	$pdo = conectar();


	try{
		$assinaros = $pdo->prepare("UPDATE dbos SET aguardparada='1' WHERE id=?");
		$assinaros->bindValue(1,$id,PDO::PARAM_INT);
		$assinaros->execute();

		if($assinaros->rowCount() == 1):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}



function qntos(){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos");

		echo $listarpedidos->rowCount();

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function qntosaberta(){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos WHERE status='Aberta'");

		echo $listarpedidos->rowCount();

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function qntosassinatura(){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos WHERE status='Assinatura'");

		echo $listarpedidos->rowCount();

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function qntosfechada(){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos WHERE status='Fechada'");

		echo $listarpedidos->rowCount();

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


function listarhist($data1, $data2, $maquina){
	
	$pdo = conectar();

	try{

		$listarhist = $pdo->prepare("SELECT * FROM dbos WHERE data >= ? AND data < ? AND maquina=? AND status='Fechada'");
		$listarhist->bindValue(1, $data1, PDO::PARAM_STR);
		$listarhist->bindValue(2, $data2, PDO::PARAM_STR);
		$listarhist->bindValue(3, $maquina, PDO::PARAM_STR);
		$listarhist->execute();

		if($listarhist->rowCount() > 0):
			return $listarhist->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


function relatoriocon2($data1, $data2, $maquina){
	
	$pdo = conectar();

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



function relatoriomecele($data1, $data2, $manutentor){
	
	$pdo = conectar();

	try{

		$relatoriocon2 = $pdo->prepare("SELECT * FROM dbos WHERE data >= ? AND data < ? AND manutentor = ?");
		$relatoriocon2->bindValue(1, $data1, PDO::PARAM_STR);
		$relatoriocon2->bindValue(2, $data2, PDO::PARAM_STR);
		$relatoriocon2->bindValue(3, $manutentor, PDO::PARAM_STR);
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


function send_notification($token,$titulo,$mensagem)
{

define( 'API_ACCESS_KEY', 'AAAADe1cCWE:APA91bHzd88P2edD16ZDKC0YWYKLOfS17VNKftoE9y6SIY4cRpliE0BQ9fGIW34uLsKwo5mPagUP0hIOy39jln_zbtjDI9LEeaz4fsFqvVjHpCE5flCXqGmFweZNKXe-V83Ih5S2iday');
 
     $msg = array
          (
		'body' 	=> $mensagem,
		'title'	=> $titulo,
             	
          );
	$fields = array
			(
				'to'		=> $token,
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
}


function notifyusuarios(){
	
	$pdo = conectar();

	try{

		$notifyusuarios = $pdo->prepare("SELECT * FROM usuarios WHERE cargo >= 5");
		$notifyusuarios->execute();

		if($notifyusuarios->rowCount() > 0):
			return $notifyusuarios->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


function listarpreventiva(){
	
	$pdo = conectar();

	try{

		$listarpedidos = $pdo->query("SELECT * FROM dbos WHERE tipomanu='Preventiva' AND notify='2' ORDER BY id DESC");

		if($listarpedidos->rowCount() > 0):
			return $listarpedidos->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function cadastropreventiva($setor,$maquina,$motivo,$data){
	
	$pdo = conectar();

	try{
		$cadastro = $pdo->prepare("INSERT INTO preventiva (setor, maquina, motivo, dataini, status) VALUES (?,?,?,?,'Aguardando')");
		$cadastro->bindValue(1, $setor, PDO::PARAM_STR);
		$cadastro->bindValue(2, $maquina, PDO::PARAM_STR);
		$cadastro->bindValue(3, $motivo, PDO::PARAM_STR);
		$cadastro->bindValue(4, $data, PDO::PARAM_STR);
		$cadastro->execute();

		if($cadastro->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function finalizar_prev($id, $manutentor, $manutentor2, $datafin, $horainicial, $horafinal){
	
	$pdo = conectar();

	$servico = 'Foi realizado a manutenção preventiva conforme check-list do equipamento.';

	try{
		$finalizar_prev = $pdo->prepare("UPDATE dbos SET status='Finalizado', manutentor=?, manutentor2=?, datafinal=?, horainicial=?, horafinal=?, servico=? WHERE id=?");
		$finalizar_prev->bindValue(1, $manutentor, PDO::PARAM_STR);
		$finalizar_prev->bindValue(2, $manutentor2, PDO::PARAM_STR);
		$finalizar_prev->bindValue(3, $datafin, PDO::PARAM_STR);
		$finalizar_prev->bindValue(4, $horainicial, PDO::PARAM_STR);
		$finalizar_prev->bindValue(5, $horafinal, PDO::PARAM_STR);
		$finalizar_prev->bindValue(6, $servico, PDO::PARAM_STR);
		$finalizar_prev->bindValue(7, $id, PDO::PARAM_INT);
		$finalizar_prev->execute();

		if($finalizar_prev->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function localizarmanutentor($manutentor){
	
	$pdo = conectar();

	try{

		$listarhist = $pdo->prepare("SELECT * FROM dbos WHERE manutentor = ? AND status='Em execução'");
		$listarhist->bindValue(1, $manutentor, PDO::PARAM_STR);
		$listarhist->execute();

		if($listarhist->rowCount() > 0):
			return $listarhist->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}



function atualizarnotify($id){
	
	$pdo = conectar();

	try{
		$atualizarnotify = $pdo->prepare("UPDATE dbos SET notify=1 WHERE id=?");
		$atualizarnotify->bindValue(1, $id, PDO::PARAM_INT);
		$atualizarnotify->execute();

		if($atualizarnotify->rowCount() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}