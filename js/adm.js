$(document).ready(function(){

	listarprodutos('ajax/controle.php', 'listar_servadmin');

	function listarprodutos(url, acao, atualizar){
		$.post(url, {acao: acao}, function(retorno){
			var tbody = $('.table').find('tbody');
			var load = tbody.find('#load');

			if(atualizar == true){
				tbody.html(retorno);
			}else{
				load.fadeOut('slow',function(){
					tbody.html(retorno);

				});
			}
		});
	}


	//BOTAO REALIZAR SERVICO
	$('.table').on("click", '#excluiros', function(){
		var id = $(this).attr('data-id');
		var botao = $(this).find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: 'POST',
			data: {acao: 'excluiros',  id: id},
			beforeSend: function(){
						botao.attr('disabled', true);
						$('#load').fadeIn('slow');
					},
			success: function(retorno){
				botao.attr('disabled', false);

				if(retorno === "excluiu"){
					$('#load').fadeOut('slow', function(){
						msgfun('OS Excluida com sucesso!', 'sucesso');
						listarprodutos('ajax/controle.php', 'listar_servadmin', true);
					});
				} else{
					msgfun('Erro ao Excluir OS!', 'erro');
				}
			}
		});
		return false;	
	});

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