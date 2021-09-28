$(document).ready(function(){
	var conteudo = $('.modal-body');

	listarpedidos('ajax/controle.php', 'listar_preventiva');

	//FUNCAO DE LISTAR PEDIDOS
	function listarpedidos(url,acao, atualizar){
		$.post(url, {acao: acao}, function(retorno){
			var tbody = $('.table').find('tbody');
			var load = tbody.find('#load');

			if(atualizar === true){
				tbody.html(retorno);
			} else {
				load.fadeOut('slow', function(){
					tbody.html(retorno);
				});
			}
		});
	}

	$('.table').on("click", '#visu_ficha', function(){
		var id = $(this).attr('data-id');
		var maq = $(this).attr('data-maq');

		window.open('paginas/fichatecnica.php?id='+id+'&maq='+maq, '_blank')
		
		return false;
	});

	//Cadastro de Servico
	$('.btn-group').on("click", '#cadprev', function(){
		$.post('ajax/caduser.php', {acao: 'cad_preventiva'}, function(retorno){
			$('#ExemploModalCentralizado').modal({backdrop: 'static'});
			$('#TituloModalCentralizado').html('Nova Preventiva');
			conteudo.html(retorno);
		});
	});

	//CADASTRAR SERIVCO
	$('#ExemploModalCentralizado').on('submit', 'form[name="form_cadprev"]', function(){
		var form = $(this);
		var botao = form.find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: "POST",
			data: 'acao=cadastro_servico&'+form.serialize(),
			beforeSend: function(){
				botao.attr('disable', true);
				$('#load').fadeIn('slow');
			},
			success: function(retorno){
				botao.attr('disabled', false);
				$('#load').fadeOut('slow');

				if(retorno === 'faltou'){
					msgfun('Algum item preenchido incorretamente!','alerta');
				} else {
					form.fadeOut('slow', function(){
						listarpedidos('ajax/controle.php', 'listar_preventiva',true);
						msgfun('Preventiva adicionada com sucesso!','sucesso');
					});
				}
			}

		});
		return false;
	});

	//Finalziar preventiva
	$('.table').on("click", '#finalizar_prev1', function(){
		var id = $(this).attr('data-id');
		$.post('ajax/caduser.php', {acao: 'finalizar_prev1', id: id}, function(retorno){
			$('#ExemploModalCentralizado').modal({backdrop: 'static'});
			$('#TituloModalCentralizado').html('Finalizar Preventiva');
			conteudo.html(retorno);
		});
	});

	//Nova SS preventiva
	$('.table').on("click", '#add_ss', function(){
		var id = $(this).attr('data-id');
		var setor = $(this).attr('data-setor');
		var maquina = $(this).attr('data-maq');
		$.post('ajax/caduser.php', {acao: 'add_ss', id: id, setor: setor, maquina: maquina}, function(retorno){
			$('#ExemploModalCentralizado').modal({backdrop: 'static'});
			$('#TituloModalCentralizado').html('Adicionar Serviço - Preventiva');
			conteudo.html(retorno);
		});
	});


	//BOTAO FINALIZAR PREVENTIVA
	$('#ExemploModalCentralizado').on('submit', 'form[name="form_finalizarprev"]', function(){
		var form = $(this);
		var botao = $(this).find(':button');
		

		$.ajax({
			url: 'ajax/controle.php',
			type: 'POST',
			data: 'acao=finalizar_prev2&'+form.serialize(),
			beforeSend: function(){
						botao.attr('disabled', true);
						$('#load').fadeIn('slow');
					},
			success: function(retorno){
				botao.attr('disabled', false);

				if(retorno === "finalizado"){
					$('#load').fadeOut('slow', function(){
						form.fadeOut('slow', function(){
							msgfun('Preventiva finalizada com sucesso!', 'sucesso');
							listarpedidos('ajax/controle.php', 'listar_preventiva');	
						});				
					});
				} else{
					$('#load').fadeOut('slow', function(){
						form.fadeOut('slow', function(){
							msgfun('Erro ao finalizar preventiva!', 'erro');
						});	
					});
				}
			}
		});
		return false;	
	});

	//CADASTRAR SS
	$('#ExemploModalCentralizado').on('submit', 'form[name="form_cadserv"]', function(){
		var form = $(this);
		var botao = form.find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: "POST",
			data: 'acao=cadastro_servico&'+form.serialize(),
			beforeSend: function(){
				botao.attr('disable', true);
				$('#load').fadeIn('slow');
			},
			success: function(retorno){
				$('#load').fadeOut('slow');

				if(retorno === 'faltou'){
					msgfun('Algum item preenchido incorretamente!','alerta');
				} else {
					form.fadeOut('slow', function(){
						msgfun('Preventiva solicitada com sucesso!','sucesso');
						listarpedidos('ajax/controle.php', 'listar_preventiva');
					});
					

				}
			}

		});
		return false;
	});


	//VISUALIZAR SS
	$('.table').on("click", '#visu_ss', function(){
		var id = $(this).attr('data-id');
		var maquina = $(this).attr('data-maq');
		$.post('ajax/controle.php', {acao: 'listaprev_ss', id: id}, function(retorno){
			$('.bd-example-modal-xl').modal({backdrop: 'static'});
			$('#TituloModalCentralizado2').html('Lista de Serviços Preventiva - '+maquina);
			conteudo.html(retorno);
		});
	});

	//BOTAO REALIZAR SERVICO
	$('.bd-example-modal-xl').on("click", '#editar_prod', function(){
		$(this).fadeOut('fast',function(){


		var id = $(this).attr('data-id');
		var status = $(this).attr('data-status');
		var manu = $(this).attr('data-manu');
		$('#loadedit').fadeIn('slow');

		if(status === "0"){
			$.post('ajax/caduser.php', {acao: 'form_iniciarserv', id: id}, function(retorno){
				$('#loadedit').fadeOut('slow');
				$('.bd-example-modal-xl').modal({backdrop: 'static'});
				$('#TituloModalCentralizado').html('Iniciar Serviço');
				conteudo.html(retorno);
			});
		} 

		if(status === "1") {
			if(manu === "0"){
				$.post('ajax/caduser.php', {acao: 'form_finalizarserv', id: id}, function(retorno){
					$('#loadedit').fadeOut('slow');
					$('.bd-example-modal-xl').modal({backdrop: 'static'});
					$('#TituloModalCentralizado').html('Finalizar Serviço');
					conteudo.html(retorno);
				});
			} else{
				$.post('ajax/caduser.php', {acao: 'form_2manutentorfin', id: id}, function(retorno){
					$('#loadedit').fadeOut('slow');
					$('.bd-example-modal-xl').modal({backdrop: 'static'});
					$('#TituloModalCentralizado').html('Finalizar Serviço');
					conteudo.html(retorno);
				});
			}
			
		}
		});
	});


	//BOTAO INICIAR SERVICO
	$('.bd-example-modal-xl').on("submit", 'form[name="form_iniciarserv"]', function(){
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
						listarpedidos('ajax/controle.php', 'listar_preventiva', true);
						msgfun('Serviço iniciado com sucesso!', 'sucesso');
					});
				}

				
			}
		});
		return false;
	});


	//BOTAO FINALIZAR SERVICO
	$('.bd-example-modal-xl').on("submit", 'form[name="form_finalizarserv"]', function(){
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
						listarpedidos('ajax/controle.php', 'listar_preventiva', true);
						msgfun('Serviço finalizado com sucesso!', 'sucesso');
					});
				}

				
			}
		});
		return false;
	});

	//BOTAO 2 MANUTENTOR
	$('.bd-example-modal-xl').on("click", '#2manutentor', function(){
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
	$('.bd-example-modal-xl').on("submit", 'form[name="form_2manutentorini"]', function(){
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
						listarpedidos('ajax/controle.php', 'listar_preventiva', true);
						msgfun('Serviço finalizado com sucesso!', 'sucesso');
					});
				}
			}
		});
		return false;
	});


	//2 MANUTENTOR CLICK FINALIZAR
	$('.bd-example-modal-xl').on("submit", 'form[name="form_2manutentorfin"]', function(){
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
						listarpedidos('ajax/controle.php', 'listar_preventiva', true);
						msgfun('Serviço finalizado com sucesso!', 'sucesso');
					});
				}
			}
		});
		return false;
	});



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

