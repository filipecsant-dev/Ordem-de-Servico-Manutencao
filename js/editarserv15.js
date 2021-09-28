$(document).ready(function(){
	var conteudo = $('.modal-body');

	listarprodutos('ajax/controle.php', 'listar_editserv');

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


	//Alterar de Servico
	$('.table').on("click", '#edit_serv', function(){
		var id = $(this).attr('data-id');

		$.post('ajax/caduser.php', {acao: 'form_editarserv', id: id}, function(retorno){
			$('#ExemploModalCentralizado').modal({backdrop: 'static'});
			$('#TituloModalCentralizado').html('Alterar Serviço');
			conteudo.html(retorno);
		});
	});

	//BOTAO INICIAR SERVICO
	$('#ExemploModalCentralizado').on("submit", 'form[name="form_editarserv"]', function(){
		var dados = $(this);
		var botao = dados.find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: "POST",
			data: 'acao=editarserv&'+dados.serialize(),
			beforeSend: function(){
				botao.attr('disabled', true);
				$('#load').fadeIn('slow');
			},

			success: function(retorno){
				botao.attr('disabled', false);
				$('#load').fadeOut('slow');
				if(retorno === 'erro'){
					dados.fadeOut('slow', function(){
						msgfun('Erro ao alterar serviço!', 'erro');
					});
				} else {

					dados.fadeOut('slow', function(){
						listarpedidos('ajax/controle.php', 'listar_editarserv', true);
						msgfun('Serviço alterado com sucesso!', 'sucesso');
					});
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