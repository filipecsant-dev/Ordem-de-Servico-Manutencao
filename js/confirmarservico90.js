$(document).ready(function(){
	var conteudo = $('.modal-body');
	var dados2;

	listarprodutos('ajax/controle.php', 'listar_confirmarserv');

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

	function listarprodutos2(url, acao, atualizar, area){
		$.post(url, {acao: acao, area: area}, function(retorno){
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
	$('.table').on("click", '#assinaros', function(){
		var id = $(this).attr('data-id');
		var botao = $(this).find(':button');

		$.ajax({
			url: 'ajax/controle.php',
			type: 'POST',
			data: {acao: 'assinaros',  id: id},
			beforeSend: function(){
						botao.attr('disabled', true);
						$('#load').fadeIn('slow');
					},
			success: function(retorno){
				botao.attr('disabled', false);

				if(retorno === "atualizou"){
					$('#load').fadeOut('slow', function(){
						msgfun('OS Assinada com sucesso!', 'sucesso');
						if(dados2 != null){
							listarprodutos2('ajax/controle.php', 'listar_confirmarserv2', true, dados2);
						}else{
							listarprodutos('ajax/controle.php', 'listar_confirmarserv', true);
						}
						
					});
				} else{
					msgfun('Erro ao Assinar OS!', 'erro');
				}
			}
		});
		return false;	
	});


	$("#checkTodos").click(function(){
   	 $('input:checkbox').prop('checked', $(this).prop('checked'));
   });





	$('.navbar').on("submit", 'form[name="form_buscar2"]', function(){
			var dados = document.getElementById('search2').value;
			dados2 = document.getElementById('search2').value;
			if(dados != ''){
				$.post('ajax/controle.php', {acao: 'listar_busca2', dados: dados}, function(retorno){
					var tbody = $('.table').find('tbody');
					var load = tbody.find('#load');
					if(retorno != false){
						tbody.html(retorno);
						document.getElementById('asstd').style.cssText = 'display:block';
					} else {
						alert('Nenhuma OS encontrada!');
					}
					
				});
			} else {
				alert('Necessário informa a pesquisa!');
			}

		return false;
	});

	//BOTAO ASSINAR TODOS
	$('.table-responsive').on("click", '#buttonasstd', function(){
		var botao = $(this);

		$.ajax({
			url: 'ajax/controle.php',
			type: 'POST',
			data: {acao: 'assinartdos',  area: dados2},
			beforeSend: function(){
						botao.attr('disabled', true);
						$('#load3').fadeIn('slow');
					},
			success: function(retorno){
				botao.attr('disabled', false);
				console.log(retorno);
				if(retorno === "atualizou"){
					$('#load3').fadeOut('slow', function(){
						msgfun('Todas OS deste setor foi assinada com Sucesso!', 'sucesso');
						listarprodutos('ajax/controle.php', 'listar_confirmarserv', true);
						document.getElementById('asstd').style.cssText = "display:none";
					});
				} else{
					$('#load3').fadeOut('slow', function(){
						msgfun('Erro ao Assinar Todas as OS!', 'erro');
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