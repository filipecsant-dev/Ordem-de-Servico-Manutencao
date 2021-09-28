$(document).ready(function(){
	var conteudo = $('.modal-body');

	function contains(str, search){
         if(str.indexOf(search) >= 0){
           return true;
         } else {
           return false;
         }
        }
        $.fn.capitalize = function(str) {
            $.each(this, function() {
                var split = this.value.split('');

                for (var i = 0, len = split.length; i < len; i++) {
          
                if(i < 1){
                  split[i] = split[i].charAt(0).toUpperCase() + split[i].slice(1);
                } else {
                  split[i] = split[i].toLowerCase();
                }
                    
                }
                this.value = split.join('');
            });
            return this;
        };

        $("input").keyup(function(e) {
            var str = String.fromCharCode(e.which);
            $(this).capitalize(str);
        });

	//CADASTRAR SERIVCO
	$('.table').on('submit', 'form[name="form_cadserv"]', function(){
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
					$('html, body').animate({scrollTop:0}, 'fast');
				} else {
					msgfun('Serviço solicitado com sucesso!','sucesso');
					$('input').val('');
					$('select').val('');
					$('html, body').animate({scrollTop:0}, 'fast');

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

