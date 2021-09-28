<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	    $id = $_POST['id'];
	    $status = $_POST['status'];
	    $maquina = $POST['maquina'];
	    $data = $POST['data'];
	    

	    require_once("conexao2.php");
	    require_once("../../funcoes/banco/conexao.php");
	    require_once("../../funcoes/crud/crud.php");
	    require 'sendmail.php';
	    
	    try{

		    $query = "UPDATE preventiva SET status='$status' WHERE id = '$id'";



			sendmail($maquina,$data,$status);

		    if(mysqli_query($conn, $query)){
		    	$response['sucesso'] = true;
		    	$response['mensagem'] = "Sucesso";
				
				
		
		    }else{
		    	$response['sucesso'] = false;
		    	$response['mensagem'] = "Falha";
		    }
			
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}

	} else {
		$response['sucesso'] = false;
	    $response['mensagem'] = "Erro";


	}

	echo json_encode($response);