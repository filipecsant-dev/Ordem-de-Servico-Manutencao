<?php 
	require "../funcoes/banco/conexao.php";
	require "../funcoes/crud/crud.php";

	$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);


?>
<option selected value="">- Escolha o tamanho -</option>
<?php
	if(listarsubcategorias2($categoria))
	{
		$minhacategoria = listarsubcategorias2($categoria);
		foreach ($minhacategoria as $mcat) {
?>

<option value="<?php echo $mcat->tamanho; ?>"><?php echo $mcat->tamanho; ?></option>

<?php
		}
	}
?>

<option value="Todos">Todos</option>