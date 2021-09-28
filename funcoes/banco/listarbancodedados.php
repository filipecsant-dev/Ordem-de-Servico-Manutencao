<?php
define('HOST', 'den1.mysql2.gear.host');
define('USUARIO', 'norpack');
define('SENHA', 'teste#');

$dbh = new PDO('mysql:host='.HOST.';user='.USUARIO.';password='.SENHA.';');
$statement = $dbh->query('SHOW TABLES');
print_r( $statement->fetchAll() );