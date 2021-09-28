$(document).ready(function(){

	listarhorasparadas('ajax/controle.php', 'listar_horasparadasext', 'ext');
	listarhorasparadas('ajax/controle.php', 'listar_horasparadasimp', 'imp');
	listarhorasparadas('ajax/controle.php', 'listar_horasparadasreb', 'reb');
	listarhorasparadas('ajax/controle.php', 'listar_horasparadascs', 'cs');
	listarhorasparadas('ajax/controle.php', 'listar_horasparadasmist', 'mist');

	//FUNCAO DE LISTAR PEDIDOS
	function listarhorasparadas(url,acao, maq){
		$.post(url, {acao: acao}, function(retorno){
			var tbody = $('.'+maq).find('tbody');
			var load = tbody.find('#load');

			
				load.fadeOut('slow', function(){
					tbody.html(retorno);
				});
		});
	}


//---------------------------------------- FIM ATUALIZAR PEDIDO --------------------------------->
	//Funções de Mensagem
	function msgfun(msg, tipo){
		var retorno = $('.aviso');
		var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('INFORME MENSAGENS DE SUCESSO, ALERTA, ERRO E INFO');
	
		retorno.empty().fadeOut('fast', function(){
			return $(this).html('<div class="alert alert-'+tipo+'">'+msg+'</div>').fadeIn('slow');
		});
	}

	function msgfun2(msg, tipo){
		var retorno = $('.aviso2');
		var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('INFORME MENSAGENS DE SUCESSO, ALERTA, ERRO E INFO');
	
		retorno.empty().fadeOut('fast', function(){
			return $(this).html('<div class="alert alert-'+tipo+'">'+msg+'</div>').fadeIn('slow');
		});
	}

});

