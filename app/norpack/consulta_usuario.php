<?php

	require "conexao.php";

	$pdo = $conn;

	$verusuario = $pdo->query("SELECT * FROM usuarios WHERE cargo >= 5");

	$resultado = array();

	if($verusuario->rowCount() > 0){
		while($usuario = $verusuario->fetch(PDO::FETCH_OBJ)){
			if($usuario->usuario === "Filipe"){
				$resultado[] = array("log"=>0,"usuario"=>$usuario->usuario, "senha"=>$usuario->senhaapp);
			}else{
				$resultado[] = array("log"=>0,"usuario"=>$usuario->usuario, "senha"=>$usuario->senhaapp);
			}
			
		}

		echo json_encode($resultado);
	}else{
		echo "erro no usuario";
	}

?>