$(document).ready(function(){

	atualizaros();

	function atualizaros(){
		listaros();
		setTimeout(function(){
			atualizaros();
		},30000);
	}
	

});