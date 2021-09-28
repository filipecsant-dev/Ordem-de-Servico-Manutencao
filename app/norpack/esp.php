<?php

	require "../../funcoes/banco/conexao.php";
function listarpedidos(){
	$db = "norpack";
	$pdo = conectar($db);

	try{

		$listarpedidos = $pdo->query("SELECT * FROM usuarios");

		if($listarpedidos->rowCount() > 0):
			return $listarpedidos->fetchAll(PDO::FETCH_OBJ);
		else:
			return FALSE;
		endif;

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

if (listarpedidos()) { 
	$pedidos = listarpedidos();
	foreach($pedidos as $ped){
		if($ped->usuario === "Filipe"){
		echo $ped->cargo;
		}
	}
	
	
}

?>