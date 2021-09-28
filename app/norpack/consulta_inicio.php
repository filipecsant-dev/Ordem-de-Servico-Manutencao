<?php

	require "conexao.php";

	$pdo = $conn;

	$verinicio = $pdo->query("SELECT * FROM dbos WHERE maquinaparada = 'Sim' ORDER BY id DESC");

	$resultado = array();

	if($verinicio->rowCount() > 0){
		while($inicio = $verinicio->fetch(PDO::FETCH_OBJ)){
			$resultado[] = array("os"=>$inicio->id, "data"=>$inicio->data, "hora"=>$inicio->hora, "maquina"=>$inicio->maquina, "motivo"=>$inicio->falha);
		}

		echo json_encode($resultado);
	}else{
		echo "erro no inicio";
	}

?>