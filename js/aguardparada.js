$(document).ready(function(){
	var conteudo = $('.modal-body');

	setTimeout(function() {
	  listarpedidos2('ajax/controle.php', 'listar_pedidosaguardparada',true);
	}, 30000);

	listarpedidos('ajax/controle.php', 'listar_pedidosaguardparada');

	function listarpedidos(url, acao, atualizar){
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

	function listarpedidos2(url, acao, atualizar){
		$.post(url, {acao: acao}, function(retorno){
			var tbody = $('.table').find('tbody');
			var load = tbody.find('#load');

			if(atualizar == true){
				tbody.html(retorno);
				setTimeout(function() {
				  listarpedidos2('ajax/controle.php', 'listar_pedidosaguardparada',true);
				}, 30000);
			}else{
				load.fadeOut('slow',function(){
					tbody.html(retorno);

				});
			}
		});
	}


	//BOTAO REALIZAR SERVICO
	$('.table').on("click", '#editar_prod', function(){
		var id = $(this).attr('data-id');
		var status = $(this).attr('data-status');
		var manu = $(this).attr('data-manu');
		$('#loadedit').fadeIn('slow');

		if(status === "0"){
			$.post('ajax/caduser.php', {acao: 'form_iniciarserv', id: id}, function(retorno){
				$('#loadedit').fadeOut('slow');
				$('#ExemploModalCentralizado').modal({backdrop: 'static'});
				$('#TituloModalCentralizado').html('Iniciar Serviço');
				conteudo.html(retorno);
			});
		} 

		if(status === "1") {
			if(manu === "0"){
				$.post('ajax/caduser.php', {acao: 'form_finalizarserv', id: id}, function(retorno){
					$('#loadedit').fadeOut('slow');
					$('#ExemploModalCentralizado').modal({backdrop: 'static'});
					$('#TituloModalCentralizado').html('Finalizar Serviço');
					conteudo.html(retorno);
				});
			} else{
				$.post('ajax/caduser.php', {acao: 'form_2manutentorfin', id: id}, function(retorno){
					$('#loadedit').fadeOut('slow');
					$('#ExemploModalCentralizado').modal({backdrop: 'static'});
					$('#TituloModalCentralizado').html('Finalizar Serviço');
					conteudo.html(retorno);
				});
			}
			
		}
	});


	//BOTAO INICIAR SERVICO
	$('#ExemploModalCentralizado').on("submit", 'form[name="form_iniciarserv"]', function(){
		var dados = $(this);
		var botao = dados.find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: "POST",
			data: 'acao=iniciarserv&'+dados.serialize(),
			beforeSend: function(){
				botao.attr('disabled', true);
				$('#load').fadeIn('slow');
			},

			success: function(retorno){
				botao.attr('disabled', false);
				$('#load').fadeOut('slow');
				if(retorno === 'faltou'){
					msgfun('Dados incompletos ou errados!', 'alerta');
				} else if(retorno === 'erro'){
					dados.fadeOut('slow', function(){
						msgfun('Erro ao iniciar serviço!', 'erro');
					});
				} else {

					dados.fadeOut('slow', function(){
						listarpedidos('ajax/controle.php', 'listar_pedidosaguardparada', true);
						msgfun('Serviço iniciado com sucesso!', 'sucesso');
					});
				}

				
			}
		});
		return false;
	});


	//BOTAO FINALIZAR SERVICO
	$('#ExemploModalCentralizado').on("submit", 'form[name="form_finalizarserv"]', function(){
		var dados = $(this);
		var botao = dados.find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: "POST",
			data: 'acao=finalizarserv&'+dados.serialize(),
			beforeSend: function(){
				botao.attr('disabled', true);
				$('#load').fadeIn('slow');
			},

			success: function(retorno){
				botao.attr('disabled', false);
				$('#load').fadeOut('slow');
				if(retorno === 'faltou'){
					msgfun('Dados incompletos ou errados!', 'alerta');
				} else if(retorno === 'erro'){
					dados.fadeOut('slow', function(){
						msgfun('Erro ao finalizar serviço!', 'erro');
					});
				} else {

					dados.fadeOut('slow', function(){
						listarpedidos('ajax/controle.php', 'listar_pedidosaguardparada', true);
						msgfun('Serviço finalizado com sucesso!', 'sucesso');
					});
				}

				
			}
		});
		return false;
	});

	//BOTAO 2 MANUTENTOR
	$('#ExemploModalCentralizado').on("click", '#2manutentor', function(){
		form = $('#ExemploModalCentralizado').find('form[name="form_finalizarserv"]');
		var id = form.find('#id').attr('data-id');

		form.fadeOut('slow', function(){
			
			});
		$('#ExemploModalCentralizado').fadeIn('slow', function(){
			$.post('ajax/caduser.php', {acao: 'form_2manutentorini', id: id}, function(retorno){
				conteudo.html(retorno);
			});
		});
		
	});

	//2 MANUTENTOR CLICK INICIAR
	$('#ExemploModalCentralizado').on("submit", 'form[name="form_2manutentorini"]', function(){
		var dados2 = $(this);
		var botao2 = dados2.find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: "POST",
			data: 'acao=2manutentorini&'+dados2.serialize(),

			beforeSend: function(){
				botao2.attr('disabled', true);
				$('#load2').fadeIn('slow');
			},

			success: function(retorno){
				botao2.attr('disabled', false);
				$('#load2').fadeOut('slow');
				

				if(retorno === 'faltou'){
					msgfun('Dados incompletos ou errados!', 'alerta');
				}else if(retorno === 'erro'){
					dados2.fadeOut('slow', function(){
						msgfun('Erro ao finalizar serviço!', 'erro');
					});
				}else{
					dados2.fadeOut('slow', function(){
						listarpedidos('ajax/controle.php', 'listar_pedidosaguardparada', true);
						msgfun('Serviço finalizado com sucesso!', 'sucesso');
					});
				}
			}
		});
		return false;
	});


	//2 MANUTENTOR CLICK FINALIZAR
	$('#ExemploModalCentralizado').on("submit", 'form[name="form_2manutentorfin"]', function(){
		var dados2 = $(this);
		var botao2 = dados2.find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: "POST",
			data: 'acao=2manutentorfin&'+dados2.serialize(),

			beforeSend: function(){
				botao2.attr('disabled', true);
				$('#load2').fadeIn('slow');
			},

			success: function(retorno){
				botao2.attr('disabled', false);
				$('#load2').fadeOut('slow');


				if(retorno === 'faltou'){
					msgfun('Dados incompletos ou errados!', 'alerta');
				}else if(retorno === 'erro'){
					dados2.fadeOut('slow', function(){
						msgfun('Erro ao finalizar serviço!', 'erro');
					});
				}else{
					dados2.fadeOut('slow', function(){
						listarpedidos('ajax/controle.php', 'listar_pedidosaguardparada', true);
						msgfun('Serviço finalizado com sucesso!', 'sucesso');
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