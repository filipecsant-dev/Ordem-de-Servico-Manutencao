<?php

	require "conexao.php";

	$pdo = $conn;

	$verpreventiva = $pdo->query("SELECT * FROM preventiva ORDER BY id DESC");

	$resultado = array();

	if($verpreventiva->rowCount() > 0){
		while($prev = $verpreventiva->fetch(PDO::FETCH_OBJ)){
			$resultado[] = array("id"=>$prev->id, "maquina"=>$prev->maquina, "motivo"=>$prev->motivo, "data"=>$prev->data, "status"=>$prev->status);
		}

		echo json_encode($resultado);
	}else{
		echo "erro na preventiva";
	}

?>