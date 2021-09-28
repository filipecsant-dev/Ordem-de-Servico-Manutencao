
<?php
ob_start(); session_start();
require '../funcoes/banco/conexao.php';
require '../funcoes/login/login.php';
require '../funcoes/crud/crud.php';
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
date_default_timezone_set('America/Sao_Paulo');
switch ($acao) {
	//CADASTRAR USUÁRIO	
	case 'form_cad':

		?>	

		<div class="aviso"></div>
		<form action="" name="form_cad" method="post">
		   <div class="form-group row">
		   	<label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
		    <div class="col">
		      <input type="text" id="meunome" class="form-control" name="usuario" placeholder="Nome">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" name="senha" id="inputPassword" placeholder="Senha">
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Cargo</label>
		    <div class="col-auto my-1">
		      <select class="custom-select mr-sm-2" name="cargo" id="inlineFormCustomSelect">
		        <option selected value="0">Selecione</option>
		        <option value="1">Operador</option>
		        <option value="2">Mecânica</option>
		        <option value="3">Elétrica</option>
		        <option value="4">Líder</option>
		        <option value="5">Inspetor</option>
		        <option value="5">Supervisor</option>
		      </select>
		    </div>
		  </div>
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Cadastrar</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		  <br />
		  <div class="aviso2"></div>
		</form>
		<?php
		break;


		//EXCLUIR USUÁRIO
		case 'form_excluir':
		?>
		<div class="aviso"></div>
		<form action="" name="form_excluir" method="post">
		  <div class="form-group row">
		   	<label style="margin-left:30px;">Deseja realmente excluir este funcionário?</label>
		  </div>
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Excluir</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  <br />
		</form>

		<?php
		break;


		//EDITAR FUNCIONARIO DADOS
		case 'form_edit':
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$dados = edituser($id);
		?>	
		<div class="aviso"></div>
		<form action="" name="form_edituser" method="post">
		   <div class="form-group row">
		   	<label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
		    <div class="col">
		      <input type="text" class="form-control" value="<?php echo $dados->usuario; ?>" name="usuario" placeholder="Nome">
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Cargo</label>
		    <div class="col-auto my-1">
		      <select class="custom-select mr-sm-2" name="cargo" id="inlineFormCustomSelect">
		        <option <?php if($dados->cargo === "1") echo 'Selected' ?> value="1">Operador</option>
		        <option <?php if($dados->cargo === "2") echo 'Selected' ?> value="2">Mecânica</option>
		        <option <?php if($dados->cargo === "3") echo 'Selected' ?> value="3">Elétrica</option>
		        <option <?php if($dados->cargo === "4") echo 'Selected' ?> value="4">Líder</option>
		        <option <?php if($dados->cargo === "5") echo 'Selected' ?> value="5">Inspetor</option>
		        <option <?php if($dados->cargo === "5") echo 'Selected' ?> value="5">Supervisor</option>
		      </select>
		    </div>
		  </div>
		  <input type="hidden" name="id" value="<?php echo $dados->id; ?>" />
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Atualizar</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		  <br />
		  <div class="aviso2"></div>
		</form>
		<?php
		break;

//--------------------------------------------- SOLICITAR SERVICO ---------------------------------------------------

		
		case 'cad_servico':
		$fun = $_SESSION['logado'];
			?>	

			<script type="text/javascript">
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
			</script>
		<div class="aviso"></div>
		<form action="" name="form_cadserv" method="post">
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Solicitante: </label>
		    <div class="col">
		      <input type="text" class="form-control" name="solicitante" placeholder="Solicitante" >
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Prioridade</label>
		    <div class="col-auto my-1">
		      <select class="custom-select mr-sm-2" name="prioridade">
		      	<option selected value="">- Prioridade -</option>
		      	<option value="Urgente">Urgente</option>
		      	<option value="Normal">Normal</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Função</label>
		    <div class="col-auto my-1">
		      <select class="custom-select mr-sm-2" name="funcao">
		      	<?php
		      	if($fun->usuario != 'qualidade'){
		      	?>
		      	<option selected value="Operador">Operador</option>
		      	<option value="Lider">Lider</option>
		      	<option value="Supervisor">Supervisor</option>
		      	<?php
		      	} else {	
	      			?>
	      			<option value="Inspetor">Inspetor</option>
	      			<option value="Supervisor">Supervisor</option>
	      			<?php
	      		}
		      	?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Data:</label>
		    <div class="col">
		      <input  type="date" class="form-control" name="data" value="<?php echo date('Y-m-d'); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora:</label>
		    <div class="col">
		      <input  type="time" class="form-control" name="hora" value="<?php echo date('H:i'); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="setormaq" >
		      	
		      	<?php
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>
		      	<option selected value="Extrusão">Extrusão</option>
		      	<?php
		      		} if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>
		      	<option selected value="Impressão">Impressão</option>
		      	<?php
		      		} if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>
		      	<option selected value="Rebobinadeira">Rebobinadeira</option>
		      	<?php
		      		} if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>
		      	<option selected value="Corte e Solda">Corte e Solda</option>
		      	<?php
		      		} if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	 ?>
		      	<option selected value="Recuperadora">Recuperadora</option>
		      	<?php
		      		}
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	 ?>
		      	<option selected value="Misturador">Misturador</option>
		      	<?php
	      			}

	      			if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
	      		?>
		      	<option value="Laminacao">Laminação</option>
		      	<?php
	      			}

	      			if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
	      		?>
		      	<option selected value="Casa de Tubetes">Casa de Tubetes</option>
		      	<?php
		      		}

		      		if($fun ->usuario === "qualidade"){
		      	?>
		      	<option selected value="Qualidade">Qualidade</option>
		      	<?php
		      		}
		      	?>
		      	<option value="Outros">Outros</option>
		      	<?php
		      		if($fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>
		      	<option selected value="">- Setor Máquina -</option>
		      	<?php
		      }
		      	?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="maquina" >
		      	<option selected value="">- Máquina -</option>
		      	<?php 
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>
		      	<option value="Extrusora 01">Extrusora 01</option>
		      	<option value="Extrusora 02">Extrusora 02</option>
		      	<option value="Extrusora 03">Extrusora 03</option>
		      	<option value="Extrusora 04">Extrusora 04</option>
		      	<option value="Extrusora 05">Extrusora 05</option>
		      	<option value="Extrusora 06">Extrusora 06</option>
		      	<option value="Extrusora 07">Extrusora 07</option>
		      	<option value="Extrusora 08">Extrusora 08</option>
		      	<option value="Extrusora 09">Extrusora 09</option>
		      	<option value="Extrusora 10">Extrusora 10</option>
		      	<?php
		      		} if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>

		      	<option value="FP4">FP4</option>
		      	<option value="FT1">FT1</option>
		      	<option value="FO1">FO1</option>
		      	<option value="FO2">FO2</option>
		      	<option value="FO3">FO3</option>
		      	<?php
		      		} if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>

		      	<option value="Rebobinadeira 01">Rebobinadeira 01</option>
		      	<option value="Rebobinadeira 02">Rebobinadeira 02</option>
		      	<option value="Rebobinadeira 03">Rebobinadeira 03</option>
		      	<option value="Rebobinadeira 04">Rebobinadeira 04</option>
		      	<option value="Rebobinadeira 05">Rebobinadeira 05</option>
		      	<option value="Rebobinadeira 06">Rebobinadeira 06</option>
		      	<?php
		      		} if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	?>

		      	<option value="Corte e Solda 01">Corte e Solda 01</option>
		      	<option value="Corte e Solda 02">Corte e Solda 02</option>
		      	<option value="Corte e Solda 03">Corte e Solda 03</option>
		      	<option value="Corte e Solda 04">Corte e Solda 04</option>
		      	<option value="Corte e Solda 06">Corte e Solda 06</option>
		      	<option value="Corte e Solda 07">Corte e Solda 07</option>
		      	<option value="Corte e Solda 08">Corte e Solda 08</option>
		      	<?php
		      		} if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	 ?>

		      	<option value="Recuperadora 01">Recuperadora 01</option>
		      	<?php
		      		}
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
		      	 ?>

		      	<option value="Misturador 01">Misturador 01</option>
		      	<option value="Misturador 02">Misturador 02</option>
		      	<option value="Misturador 03">Misturador 03</option>
		      	<option value="Misturador 04">Misturador 04</option>
		      	<option value="Misturador 05">Misturador 05</option>
		      	<option value="Misturador 06">Misturador 06</option>
	      		<?php
	      			}

	      			if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
	      		?>
		      	<option value="Tubete">Tubete</option>

		      	<?php
	      			}

	      			if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica"){
	      		?>

		      	<option value="Laminadora">Laminadora</option>
		      	<?php
		      		}

		      		if($fun->usuairo === "qualidade"){
	      			?>
  				<option value="Sala da qualidade">Sala da qualidade</option>
  				<option value="Cabine do CQ">Cabine do CQ</option>
	      			<?php
		      		}
		      	?>

		      	<option value="Gerais Fábrica">Gerais Fábrica</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="setormanu" >
		      	<option selected value="">- Setor Manutenção -</option>
		      	<option value="Mecânica">Mecânica</option>
		      	<option value="Elétrica">Elétrica</option>
		      	<option value="Eletromecânica">Eletromecânica</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="tipomanu" >
		      	<option selected value="">- Tipo Manutenção -</option>
		      	<option value="Corretiva">Corretiva</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="falha" placeholder="Falha" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="maquinaparada" >
		      	<option selected value="">- Máquina Parada -</option>
		      	<option value="Sim">Sim</option>
		      	<option value="Não">Não</option>
		      </select>
		    </div>
		  </div>
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Enviar Solicitação</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		</form>
		<?php
		break;




		//INICAR SERVICO
		case 'form_iniciarserv':
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$dados = editprod($id);
		?>	
		<div class="aviso"></div>
		<form action="" name="form_iniciarserv" method="post">
   		   <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="manutentor" >
		      <?php if($_SESSION['logado']->cargo === '2'){ ?>
		      	<option selected value="">- Manutentor -</option>
		      	<option value="Enes">Enes</option>
		      	<option value="Pedro Pereira">Pedro Pereira</option>
		      	<option value="José Romão">José Romão</option>
		      	<option value="Erivaldo">Erivaldo</option>
		      	<option value="Osmar Guedes">Osmar Guedes</option>
		      	<option value="Pedro Gilson">Pedro Gilson</option>
		      	<option value="Prismapack">Prismapack</option>
		      <?php } else {
		      	?>
		      	<option selected value="">- Manutentor -</option>
		      	<option value="Raimundo">Raimundo</option>
		      	<option value="Antônio">Antônio</option>
		      	<option value="Fabiano">Fabiano</option>
		      	<option value="Adriano">Adriano</option>
		      	<option value="João Victor">João Victor</option>
		      	<option value="Marcos Antônio">Marcos Antônio</option>
		      <?php
		      } 
		      ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Data:</label>
		    <div class="col">
		      <input  type="date" class="form-control" name="datafinal" value="<?php echo date('Y-m-d'); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Inicial:</label>
		    <div class="col">
		      <input  type="time" class="form-control" name="horainicial" placeholder="Hora Inicial" value="<?php echo date('H:i'); ?>">
		    </div>
		  </div>
		  <input type="hidden" name="id" value="<?php echo $dados->id; ?>" />
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Iniciar Serviço</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		  <div class="aviso2"></div>
		</form>
		<?php
		break;


		//FINALIZAR SERVICO
		case 'form_finalizarserv':
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$dados = editprod($id);
		?>	
		<script type="text/javascript">
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
			</script>
		<div class="aviso"></div>
		<form action="" name="form_finalizarserv" method="post">
		   <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="manutentor2" >
		      <?php if($_SESSION['logado']->cargo === '2'){ ?>
		      	<option selected value="">- Manutentor Auxiliar -</option>
		      	<option value="Enes">Enes</option>
		      	<option value="Pedro Pereira">Pedro Pereira</option>
		      	<option value="José Romão">José Romão</option>
		      	<option value="Osmar Guedes">Osmar Guedes</option>
		      	<option value="Erivaldo">Erivaldo</option>
		      	<option value="Pedro Gilson">Pedro Gilson</option>
		      	<option value="Prismapack">Prismapack</option>
		      <?php } else {
		      	?>
		      	<option selected value="">- Manutentor Auxiliar -</option>
		      	<option value="Raimundo">Raimundo</option>
		      	<option value="Antônio">Antônio</option>
		      	<option value="Fabiano">Fabiano</option>
		      	<option value="Adriano">Adriano</option>
		      	<option value="João Victor">João Victor</option>
		      	<option value="Marcos Antônio">Marcos Antônio</option>
		      <?php
		      } 
		      ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Final:</label>
		    <div class="col">
		      <input type="time" class="form-control" name="horafinal" value="<?php echo date('H:i'); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="servico" placeholder="Serviço Realizado" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="pecasubstituida" placeholder="Materiais Utilizados" >
		    </div>
		  </div>
		   <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="observacao" placeholder="Observação (Caso houve atraso, etc)" >
		    </div>
		  </div>
		  <div class="form-group row">
		  	<div class="col">
		  		<label >Este serviço vai ser finalizado por outro manutentor?</label>
		  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="2manutentor" class="btn btn-primary">&nbsp;&nbsp;Sim&nbsp;&nbsp;</div>
		  	</div>
		  </div>
		  <input type="hidden" id="id" data-id="<?php echo $dados->id; ?>" name="id" value="<?php echo $dados->id; ?>" />
		  <input type="hidden" name="hora" value="<?php echo $dados->hora; ?>" />
		  <input type="hidden" name="horainicial" value="<?php echo $dados->horainicial; ?>" />
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Atualizar Serviço</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		  <div class="aviso2"></div>
		</form>
		<?php
		break;

		case 'form_2manutentorini':
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$dados = editprod($id);
			?>
		<div class="aviso"></div>
			<form action="" name="form_2manutentorini" method="post">   
				 <div class="form-group row">
				  	<label for="inputPassword" style="margin-left: 10px; margin-top: 5px;">Hora Final (Manutentor Anterior):</label>
				    <div class="col">
				      <input type="time" class="form-control" name="horafinal" value="<?php echo date('H:i'); ?>">
				    </div>
				  </div>
				  <div class="form-group row">
					    <div class="col-auto my-1" style="width: 100%;">
					      <select class="custom-select mr-sm-2" name="manutentor2" >
					      <?php if($_SESSION['logado']->cargo === '2'){ ?>
					      	<option selected value="">- Manutentor Seguinte -</option>
					      	<option value="Enes">Enes</option>
					      	<option value="Pedro Pereira">Pedro Pereira</option>
					      	<option value="José Romão">José Romão</option>
					      	<option value="Erivaldo">Erivaldo</option>
					      	<option value="Osmar Guedes">Osmar Guedes</option>
					      	<option value="Pedro Gilson">Pedro Gilson</option>
					      	<option value="Prismapack">Prismapack</option>
					      <?php } else {
					      	?>
					      	<option selected value="">- Manutentor Seguinte -</option>
					      	<option value="Raimundo">Raimundo</option>
					      	<option value="Antônio">Antônio</option>
					      	<option value="Fabiano">Fabiano</option>
					      	<option value="Adriano">Adriano</option>
					      	<option value="João Victor">João Victor</option>
					      	<option value="Marcos Antônio">Marcos Antônio</option>
					      <?php
					      } 
					      ?>
					      </select>
					    </div>
					  </div>
					  <div class="form-group row">
					  	<label for="inputPassword" style="margin-left: 10px; margin-top: 5px;">Hora Inicial (Manutentor Seguinte):</label>
					    <div class="col">
					      <input  type="time" class="form-control" name="horainicial2" placeholder="Hora Inicial" value="<?php echo date('H:i'); ?>">
					    </div>
					  </div>
					  <input type="hidden" name="horainicial" value="<?php echo $dados->horainicial; ?>">
					  <input type="hidden" name="id" value="<?php echo $dados->id; ?>" />
					  <button type="submit" class="btn btn-primary">Continuar Serviço</button>
					  <img src="img/load2.gif" align="center" id="load2" style="display:none; width: 30px;">
					  <div class="aviso2"></div>
			</form>
			<?php
		break;



		case 'form_2manutentorfin':
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$dados = editprod($id);
			?>

			<script type="text/javascript">
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
			</script>
			
		<div class="aviso"></div>
			<form action="" name="form_2manutentorfin" method="post">   
				 <div class="form-group row">
				  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Final:</label>
				    <div class="col">
				      <input type="time" class="form-control" name="horafinal2" value="<?php echo date('H:i'); ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col">
				      <input type="text" class="form-control" name="servico" placeholder="Serviço Realizado" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col">
				      <input type="text" class="form-control" name="pecasubstituida" placeholder="Materiais Utilizados" >
				    </div>
				  </div>
				   <div class="form-group row">
				    <div class="col">
				      <input type="text" class="form-control" name="observacao" placeholder="Observação (Caso houve atraso, etc)" >
				    </div>
				  </div>
				  <input type="hidden" name="hora" value="<?php echo $dados->hora; ?>" />
				  <input type="hidden" name="horainicial2" value="<?php echo $dados->horainicial2; ?>">
				  <input type="hidden" name="id" value="<?php echo $dados->id; ?>" />
				  <button type="submit" class="btn btn-primary">Finalizar Serviço</button>
				  <img src="img/load2.gif" align="center" id="load2" style="display:none; width: 30px;">
				  <div class="aviso2"></div>
			</form>
			<?php
		break;

		//INICAR SERVICO
		case 'form_editarserv':
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$d = editprod($id);
		
			
		?>	
		<div class="aviso"></div>
		<form action="" name="form_editarserv" method="post">

		<div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Solicitante</label>
		      <input type="text" class="form-control" name="solicitante" value="<?php echo $d->solicitante ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Data Inicial</label>
		      <input  type="date" class="form-control" name="data" value="<?php echo date('Y-m-d', strtotime($d->data)); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Função</label>
		      <input type="text" class="form-control" name="funcao" value="<?php echo $d->funcao ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora:</label>
		    <div class="col">
		      <input type="time" class="form-control" name="hora" value="<?php echo date('H:i', strtotime($d->hora)); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Máquina</label>
		      <input type="text" class="form-control" name="maquina" value="<?php echo $d->maquina ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Área</label>
		      <input type="text" class="form-control" name="setormaq" value="<?php echo $d->setormaq ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Setor Man.</label>
		      <input type="text" class="form-control" name="setormanu" value="<?php echo $d->setormanu ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Prioridade</label>
		      <input type="text" class="form-control" name="prioridade" value="<?php echo $d->prioridade ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Manutentor</label>
		      <input type="text" class="form-control" name="manutentor" value="<?php echo $d->manutentor ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Manutentor 2</label>
		      <input type="text" class="form-control" name="manutentor2" value="<?php echo $d->manutentor2 ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Falha</label>
		      <input type="text" class="form-control" name="falha" value="<?php echo $d->falha ?>" >
		    </div>
		  </div>
		 <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Serviço</label>
		      <input type="text" class="form-control" name="servico" value="<?php echo $d->servico ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Materiais</label>
		      <input type="text" class="form-control" name="pecasubstituida" value="<?php echo $d->pecasubstituida ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Obs</label>
		      <input type="text" class="form-control" name="observacao" value="<?php echo $d->observacao ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Data Final</label>
		      <input  type="date" class="form-control" name="datafinal" value="<?php if($d->datafinal !=""){ echo date('Y-m-d', strtotime($d->datafinal)); } ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Inicial:</label>
		    <div class="col">
		      <input type="time" class="form-control" name="horainicial" value="<?php echo date('H:i', strtotime($d->horainicial)); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Final:</label>
		    <div class="col">
		      <input type="time" class="form-control" name="horafinal" value="<?php echo date('H:i', strtotime($d->horafinal)); ?>">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Parada</label>
		      <input type="text" class="form-control" name="maquinaparada" value="<?php echo $d->maquinaparada ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Status</label>
		      <input type="text" class="form-control" name="status" value="<?php echo $d->status ?>" >
		    </div>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Alterar Serviço</button>
				  <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		  <input type="hidden" name="id" value="<?php echo $d->id; ?>" />

		  </form>
		

		<?php
		break;



		//EXCLUIR PRODUTO
		case 'form_prodexcluir':
		?>
		<div class="aviso"></div>
		<form action="" name="form_prodexcluir" method="post">
		  <div class="form-group row">
		   	<label style="margin-left:30px;">Deseja realmente excluir este servico?</label>
		  </div>
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Excluir</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  <br />
		</form>

		<?php
		break;





//-------------------------------------------- FIM REALIZAR SERVICO -------------------------------------------------


//----------------------------------------- PREVENTIVA ---------------------------------------------------

		
		case 'cad_preventiva':
		$fun = $_SESSION['logado'];
			?>	
			<script type="text/javascript">
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
			</script>
		<div class="aviso"></div>
		<form action="" name="form_cadprev" method="post">
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="maquina" >
		      	<option selected value="">- Máquina -</option>
		   
		      	<option value="Extrusora 01">Extrusora 01</option>
		      	<option value="Extrusora 02">Extrusora 02</option>
		      	<option value="Extrusora 03">Extrusora 03</option>
		      	<option value="Extrusora 04">Extrusora 04</option>
		      	<option value="Extrusora 05">Extrusora 05</option>
		      	<option value="Extrusora 06">Extrusora 06</option>
		      	<option value="Extrusora 07">Extrusora 07</option>
		      	<option value="Extrusora 08">Extrusora 08</option>
		      	<option value="Extrusora 09">Extrusora 09</option>
		      	<option value="Extrusora 10">Extrusora 10</option>

		      	<option value="FP4">FP4</option>
		      	<option value="FT1">FT1</option>
		      	<option value="FO1">FO1</option>
		      	<option value="FO2">FO2</option>
		      	<option value="FO3">FO3</option>

		      	<option value="Rebobinadeira 01">Rebobinadeira 01</option>
		      	<option value="Rebobinadeira 02">Rebobinadeira 02</option>
		      	<option value="Rebobinadeira 03">Rebobinadeira 03</option>
		      	<option value="Rebobinadeira 04">Rebobinadeira 04</option>
		      	<option value="Rebobinadeira 05">Rebobinadeira 05</option>
		      	<option value="Rebobinadeira 06">Rebobinadeira 06</option>

		      	<option value="Corte e Solda 01">Corte e Solda 01</option>
		      	<option value="Corte e Solda 02">Corte e Solda 02</option>
		      	<option value="Corte e Solda 03">Corte e Solda 03</option>
		      	<option value="Corte e Solda 04">Corte e Solda 04</option>
		      	<option value="Corte e Solda 06">Corte e Solda 06</option>
		      	<option value="Corte e Solda 07">Corte e Solda 07</option>
		      	<option value="Corte e Solda 08">Corte e Solda 08</option>

		      	<option value="Recuperadora 01">Recuperadora 01</option>

		      	<option value="Misturador 01">Misturador 01</option>
		      	<option value="Misturador 02">Misturador 02</option>
		      	<option value="Misturador 03">Misturador 03</option>
		      	<option value="Misturador 04">Misturador 04</option>
		      	<option value="Misturador 05">Misturador 05</option>
		      	<option value="Misturador 06">Misturador 06</option>

		      	<option value="Laminadora">Laminadora</option>

		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="motivo" placeholder="Motivo" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input  type="date" class="form-control" name="data" value="<?php echo date('Y-m-d'); ?>">
		    </div>
		  </div>
		  
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Agendar Preventiva</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		</form>
		<?php
		break;


		
	default:
		echo 'nada';
		break;
}
?>