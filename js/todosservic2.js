$(document).ready(function(){
	var conteudo = $('.modal-body');
	var forma = document.getElementById('forma').value;

	listarpedidos('ajax/controle.php', 'listar_todosservicos');

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

	$('.table').on("click", '#visualizar_os', function(){
		var id = $(this).attr('data-id');

		window.open('paginas/visu_os.php?id='+id, '_blank')
		
		return false;
	});


	$('.navbar').on("click", '#buscaos', function(){
		forma = 'os';
		document.getElementById('buscaos2').classList.add("active");

		document.getElementById('buscamaquina2').classList.remove("active");
		document.getElementById('buscastatus2').classList.remove("active");
		document.getElementById('buscamanutentor2').classList.remove("active");
		document.getElementById('buscaparada2').classList.remove("active");
	});

	$('.navbar').on("click", '#buscamaquina', function(){
		forma = 'maq';
		document.getElementById('buscamaquina2').classList.add("active");

		document.getElementById('buscaos2').classList.remove("active");
		document.getElementById('buscastatus2').classList.remove("active");
		document.getElementById('buscamanutentor2').classList.remove("active");
		document.getElementById('buscaparada2').classList.remove("active");
	});

	$('.navbar').on("click", '#buscastatus', function(){
		forma = 'status';
		document.getElementById('buscastatus2').classList.add("active");

		document.getElementById('buscaos2').classList.remove("active");
		document.getElementById('buscamaquina2').classList.remove("active");
		document.getElementById('buscamanutentor2').classList.remove("active");
		document.getElementById('buscaparada2').classList.remove("active");
	});

	$('.navbar').on("click", '#buscamanutentor', function(){
		forma = 'manu';
		document.getElementById('buscamanutentor2').classList.add("active");

		document.getElementById('buscaos2').classList.remove("active");
		document.getElementById('buscastatus2').classList.remove("active");
		document.getElementById('buscamaquina2').classList.remove("active");
		document.getElementById('buscaparada2').classList.remove("active");
	});

	$('.navbar').on("click", '#buscaparada', function(){
		forma = 'parada';
		document.getElementById('buscaparada2').classList.add("active");

		document.getElementById('buscaos2').classList.remove("active");
		document.getElementById('buscastatus2').classList.remove("active");
		document.getElementById('buscamaquina2').classList.remove("active");
		document.getElementById('buscamanutentor2').classList.remove("active");
	});



	$('.navbar').on("submit", 'form[name="form_buscar"]', function(){
		if(forma != ''){
			var dados = document.getElementById('search').value

			if(dados != ''){
				$.post('ajax/controle.php', {acao: 'listar_busca', dados: dados, forma: forma}, function(retorno){
					var tbody = $('.table').find('tbody');
					var load = tbody.find('#load');
					if(retorno != false){
						tbody.html(retorno);	
					} else {
						alert('Nenhuma OS encontrada!');
					}
					
				});
			} else {
				alert('Necessário informa a pesquisa!');
			}
		} else {
			alert('Necessário selecionar a forma de pesquisa!');
		}

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

