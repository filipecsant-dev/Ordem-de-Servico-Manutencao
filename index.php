<?php
	session_start();
	//CONEXAO DB
	require 'funcoes/banco/conexao.php';
	if (isset($_SESSION['logado'])) {
		header("Location: painel.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styleindex.css">
    <script src="js/popper.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de OS - By: Filipe Castro">
    <meta name="author" content="Filipe Castro | filipecsant@gmail.com | (071) 98340-9647">
    <meta name="generator" content="Sistema OS - By: Filipe Castro">
        <!-- Favicons -->
	<link rel="apple-touch-icon" href="img/icone2.nestweb.png" sizes="180x180">
	<link rel="icon" href="img/icone.nestweb.png" sizes="32x32" type="image/png">
	<link rel="icon" href="img/icone3.nestweb.png" sizes="16x16" type="image/png">
	<title>Sistema de OS - By: Filipe Castro</title>
	<meta http-equiv="Content-Type" content="text/html; charset-UTF-8">
	<link href="css/login.css" rel="stylesheet" media="screen">
	<link href="css/alert.css" rel="stylesheet" media="screen">
	<link href="css/sty.css" rel="stylesheet">



</head>
<body>
	
	<script src="css/js.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/customize.js"></script>
	<div class="painel">
		<div class="box">
			<div class="line"></div>
			<h2 style="justify-content: center;align-items: center;"><div class="logopack"></div></h2>
			<div class="aviso"></div>
			<form action="" class="form" method="post" name="form_login">
				<div class="form-campo">
					<input type="hidden" value="norpack" name="empresa" class="form-camp" placeholder="Informe sua empresa">
				</div>
				<div class="form-campo">
					<input type="text" name="usuario" class="form-camp" placeholder="Informe seu setor">
				</div>
				<div class="form-campo">
					<input type="password" name="senha" class="form-camp" placeholder="Informe sua senha">
				</div>
				<button type="submit" class="form-button">Entrar</button>
			</form>
			<center><img src="img/load.gif" align="center" id="load" style="display:none;width: 270px; height: 50px;"></center>
			<div class="developer">Developed by: Filipe Castro</a></div>
		</div>
	</div>
	
</body>

</html>
