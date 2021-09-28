
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
		        <option value="5">Adm</option>
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
		        <option <?php if($dados->cargo === "5") echo 'Selected' ?> value="5">Adm</option>
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
		      	if($fun->usuario != 'qualidade' || $fun->usuario != 'administracao'){
		      	?>
		      	<option selected value="Operador">Operador</option>
		      	<option value="Lider">Lider</option>
		      	<option value="Supervisor">Supervisor</option>
		      	<?php
		      	}
		      	else {	
	      			?>
	      			<option value="Adm">Adm</option>
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
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4"  or $fun->cargo === "5"){
		      	?>
		      	<option selected value="Extrusão">Extrusão</option>
		      	<?php
		      		} if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      	<option selected value="Impressão">Impressão</option>
		      	<?php
		      		} if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      	<option selected value="Rebobinadeira">Rebobinadeira</option>
		      	<?php
		      		} if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      	<option selected value="Corte e Solda">Corte e Solda</option>
		      	<?php
		      		} if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	 ?>
		      	<option selected value="Recuperadora">Recuperadora</option>
		      	<?php
		      		}
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	 ?>
		      	<option selected value="Misturador">Misturador</option>
		      	<?php
	      			}

	      			if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
	      		?>
		      	<option value="Laminacao">Laminação</option>
		      	<?php
	      			}

	      			if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
	      		?>
		      	<option selected value="Casa de Tubetes">Casa de Tubetes</option>
		      	<?php
		      		}

		      		if($fun->usuario === "qualidade" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      	<option selected value="Qualidade">Qualidade</option>
		      	<?php
		      		}
		      	?>
		      	<option value="Outros">Outros</option>
		      	<?php
		      		if($fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
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
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
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
		      		} if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>

		      	<option value="FP4">FP4</option>
		      	<option value="FT1">FT1</option>
		      	<option value="FO1">FO1</option>
		      	<option value="FO2">FO2</option>
		      	<option value="FO3">FO3</option>
		      	<option value="Lavadora de Anilox">Lavadora de Anilox</option>
		      	<option value="Lavadora de Bomba de Tinta">Lavadora de Bomba de Tinta</option>
		      	<option value="Lavadora de Doctor Blade">Lavadora de Doctor Blade</option>
		      	<?php
		      		} if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>

		      	<option value="Rebobinadeira 01">Rebobinadeira 01</option>
		      	<option value="Rebobinadeira 02">Rebobinadeira 02</option>
		      	<option value="Rebobinadeira 03">Rebobinadeira 03</option>
		      	<option value="Rebobinadeira 04">Rebobinadeira 04</option>
		      	<option value="Rebobinadeira 05">Rebobinadeira 05</option>
		      	<option value="Rebobinadeira 06">Rebobinadeira 06</option>
		      	<?php
		      		} if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>

		      	<option value="Corte e Solda 01">Corte e Solda 01</option>
		      	<option value="Corte e Solda 02">Corte e Solda 02</option>
		      	<option value="Corte e Solda 03">Corte e Solda 03</option>
		      	<option value="Corte e Solda 04">Corte e Solda 04</option>
		      	<option value="Corte e Solda 06">Corte e Solda 06</option>
		      	<option value="Corte e Solda 07">Corte e Solda 07</option>
		      	<option value="Corte e Solda 08">Corte e Solda 08</option>
		      	<?php
		      		} if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	 ?>

		      	<option value="Recuperadora 01">Recuperadora 01</option>
		      	<?php
		      		}
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	 ?>

		      	<option value="Misturador 01">Misturador 01</option>
		      	<option value="Misturador 02">Misturador 02</option>
		      	<option value="Misturador 03">Misturador 03</option>
		      	<option value="Misturador 04">Misturador 04</option>
		      	<option value="Misturador 05">Misturador 05</option>
		      	<option value="Misturador 06">Misturador 06</option>
	      		<?php
	      			}

	      			if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
	      		?>
		      	<option value="Tubete">Tubete</option>

		      	<?php
	      			}

	      			if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
	      		?>

		      	<option value="Laminadora">Laminadora</option>
		      	<?php
		      		}

		      		if($fun->usuairo === "qualidade" or $fun->cargo === "4" or $fun->cargo === "5"){
	      			?>
  				<option value="Sala da qualidade">Sala da qualidade</option>
  				<option value="Cabine do CQ">Cabine do CQ</option>
	      			<?php
		      		}
		      	?>

		      	<option value="Policorte">Policorte</option>
		      	<option value="Máquina de Cortar Tubete 01">Máquina de Cortar Tubete 01</option>
		      	<option value="Máquina de Cortar Tubete 02">Máquina de Cortar Tubete 02</option>
		      	<option value="Stretadeira 01">Stretadeira 01</option>
		      	<option value="Stretadeira 02">Stretadeira 02</option>
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
		      	<?php if($fun->cargo === "2" || $fun->cargo === "3"){ ?>
		      	<option value="Preventiva">Preventiva</option>
		      	<?php } ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="conjunto" >
		      	<option selected value="">- Conjunto -</option>
		      	<?php
		      		if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      	<option value=""><-- MECÂNICA --></option>
		      	<option value="Alimentador e Funil">Alimentador e Funil</option>
		      	<option value="Alinhador">Alinhador</option>
		      	<option value="Anel de Ar">Anel de Ar</option>
		      	<option value="Cilindro Guia">Cilindro Guia</option>
		      	<option value="Gaiola">Gaiola</option>
		      	<option value="Moinho de Refile">Moinho de Refile</option>
		      	<option value="Motores do Trocador de Calor do Túnel">Motores do Trocador de Calor do Túnel</option>
		      	<option value="Puxador">Puxador</option>
		      	<option value="Redutor Motor Principal A">Redutor Motor Principal A</option>
		      	<option value="Redutor Motor Principal B">Redutor Motor Principal B</option>
		      	<option value="Redutor Motor Principal C">Redutor Motor Principal C</option>
		      	<option value="Saia e Sanfonado">Saia e Sanfonado</option>
		      	<option value="Sistema Pneumático">Sistema Pneumático</option>
		      	<option value="Unidade de Tratamento">Unidade de Tratamento</option>
		      	<option value="Bobinador">Bobinador</option>
		      	<option value="Hidro Pneumático">Hidro Pneumático</option>
		      	<option value=""><-- ELÉTRICA --></option>
		      	<option value="Canhões">Canhões</option>
		      	<option value="Matriz">Matriz</option>
		      	<option value="Calibrador">Calibrador</option>
		      	<option value="Reversível">Reversível</option>
		      	<option value="Gaiola">Gaiola</option>
		      	<option value="Giratório">Giratório</option>
		      	<option value="Principal A">Principal A</option>
		      	<option value="Principal B">Principal B</option>
		      	<option value="Principal C">Principal C</option>
		      	<option value="Principal D">Principal D</option>
		      	<option value="Principal E">Principal E</option>
		      	<option value="Bobinadeiras">Bobinadeiras</option>
		      	<option value="Puxador">Puxador</option>
		      	<option value="Pré Arraste">Pré Arraste</option>
		      	<option value="Anel de Ar">Anel de Ar</option>
		      	<option value="Entrada de Ar">Entrada de Ar</option>
		      	<option value="Saída de Ar">Saída de Ar</option>
		      	<option value="Painéis">Painéis</option>
		      	<option value="Iluminação">Iluminação</option>
		      	<option value="Ventilação">Ventilação</option>
		      	<option value="Recuperadora de Refile">Recuperadora de Refile</option>
		      	<option value="Alinhador">Alinhador</option>
		      	<option value="Tratamento">Tratamento</option>
		      	<option value="Pressão de Massa">Pressão de Massa</option>
		      	<option value="Temperatura de Massa">Temperatura de Massa</option>
		      	<option value="Anti-Estática">Anti-Estática</option>
		      	<option value="Sistema de Segurança">Sistema de Segurança</option>
		      	<option value="Sistema Dosador">Sistema Dosador</option>
		      	<option value="Controlador de Espessura (K Design Karat)">Controlador de Espessura (K Design Karat)</option>
		      	<option value="Controlador de Espessura (Syncro)">Controlador de Espessura (Syncro)</option>
		      	<?php
		      		}

		      		if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA --></option>
		      		<option value="Tambor Central">Tambor Central</option>
		      		<option value="Desbobinador">Desbobinador</option>
		      		<option value="Rebobinador">Rebobinador</option>
		      		<option value="Balancinho">Balancinho</option>
		      		<option value="Calandra">Calandra</option>
		      		<option value="Sistema de Acionamento">Sistema de Acionamento</option>
		      		<option value="Unidade de Força Hidráulica">Unidade de Força Hidráulica</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value=""><-- ELÉTRICA --></option>
		      		<option value="Painéis">Painéis</option>
		      		<option value="Bobinadeiras">Bobinadeiras</option>
		      		<option value="Aquecimento">Aquecimento</option>
		      		<option value="Calandra">Calandra</option>
		      		<option value="Sistema de Segurança">Sistema de Segurança</option>
		      		<option value="Principal">Principal</option>
		      		<option value="Iluminação">Iluminação</option>
		      		<option value="Tambor Central">Tambor Central</option>
		      		<option value="Talha Elétrica">Talha Elétrica</option>
		      		<option value="Vídeo Scam">Vídeo Scam</option>
		      		<option value="Desbobinador">Desbobinador</option>

		      	<?php
		      		}

		      		if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA --></option>
		      		<option value="Transporte de Saída">Transporte de Saída</option>
		      		<option value="Rolo Puxador">Rolo Puxador</option>
		      		<option value="Transporte deEntrada">Transporte de Entrada</option>
		      		<option value="Cabeçote Inferior">Cabeçote Inferior</option>
		      		<option value="Balancinho">Balancinho</option>
		      		<option value="Cabeçote Superior">Cabeçote Superior</option>
		      		<option value="Pescador">Pescador</option>
		      		<option value="Desbobinador">Desbobinador</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value="Ponte de Ar">Ponte de Ar</option>
		      		<option value=""><-- ELÉTRICA --></option>
		      		<option value="Controle">Controle</option>
		      		<option value="Potência">Potência</option>
		      		<option value="Aquecimento">Aquecimento</option>
		      		<option value="Anti-Estática">Anti-Estática</option>
		      		<option value="Sistema de Segurança">Sistema de Segurança</option>
		      	<?php
		      		}

		      		if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA --></option>
		      		<option value="Desbobinador">Desbobinador</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value="Rolo Puxador">Rolo Puxador</option>
		      		<option value="Rebobinador">Rebobinador</option>
		      		<option value=""><-- ELÉTRICA --></option>
		      		<option value="Controle">Controle</option>
		      		<option value="Potência">Potência</option>
		      		<option value="Alinhador">Alinhador</option>
		      		<option value="Sistema de Segurança">Sistema de Segurança</option>
		      	<?php
		      		}

		      		if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA --></option>
		      		<option value="Moinho">Moinho</option>
		      		<option value="Recuperação">Recuperação</option>
		      		<option value="Sistema Hidráulico">Sistema Hidráulico</option>
		      		<option value="Centrífuga">Centrífuga</option>
		      		<option value="Funil Dosador">Funil Dosador</option>
		      		<option value=""><-- ELÉTRICA --></option>
		      		<option value="Canhão">Canhão</option>
		      		<option value="Matriz">Matriz</option>
		      		<option value="Centrífuga">Centrífuga</option>
		      		<option value="Principal">Principal</option>
		      		<option value="Granulador">Granulador</option>
		      		<option value="Moinho">Moinho</option>
		      		<option value="Cremmer">Cremmer</option>
		      		<option value="Silo">Silo</option>
		      		<option value="Troca Telas">Troca Telas</option>
		      		<option value="Painéis">Painéis</option>
		      		<option value="Iluminação">Iluminação</option>
		      		<option value="Pressão de Massa">Pressão de Massa</option>
		      	<?php
		      		}

		      		if($fun->usuario === "misturador" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA --></option>
		      		<option value="Mecânica">Mecânica</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value=""><-- ELÉTRICA --></option>
		      		<option value="Controle">Controle</option>
		      		<option value="Potência">Potência</option>
		      	<?php
		      		}

		      		if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value="Não possui">Não possui</option>
		      	<?php
		      		}

		      		if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value="Não possui">Não possui</option>
		      	<?php
		      		}

		      		if($fun->usuario === "qualidade" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value="Não possui">Não possui</option>
		      	<?php
		      		}
		      	?>
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
		      <?php //if($fun->cargo === "2"){ ?>
		      	<option selected value="">- Manutentor -</option>
		      	<option value="Enes">Enes</option>
		      	<option value="Pedro Pereira">Pedro Pereira</option>
		      	<option value="José Romão">José Romão</option>
		      	<option value="Erivaldo">Erivaldo</option>
		      	<option value="Osmar Guedes">Osmar Guedes</option>
		      	<option value="Pedro Gilson">Pedro Gilson</option>
		      	<option value="Prismapack">Prismapack</option>
		      <?php// } else {
		      	?>
		      	<option selected value="">- Manutentor -</option>
		      	<option value="Raimundo">Raimundo</option>
		      	<option value="Antônio">Antônio</option>
		      	<option value="Fabiano">Fabiano</option>
		      	<option value="Flavio">Flavio</option>
		      	<option value="Adriano">Adriano</option>
		      	<option value="Cicero">Cicero</option>
		      	<option value="Ronaldo">Ronaldo</option>
		      	<option value="João Victor">João Victor</option>
		      	<option value="Marcos Antônio">Marcos Antônio</option>
		      <?php
		      //} 
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
		      <input  type="time" class="form-control" name="horainicial" placeholder="Hora Inicial" value="<?php echo gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
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
		      <?php //if($fun->cargo === "2"){ ?>
		      	<option selected value="">- Manutentor Auxiliar -</option>
		      	<option value="Enes">Enes</option>
		      	<option value="Pedro Pereira">Pedro Pereira</option>
		      	<option value="José Romão">José Romão</option>
		      	<option value="Osmar Guedes">Osmar Guedes</option>
		      	<option value="Erivaldo">Erivaldo</option>
		      	<option value="Pedro Gilson">Pedro Gilson</option>
		      	<option value="Prismapack">Prismapack</option>
		      <?php //} else {
		      	?>
		      	<option selected value="">- Manutentor Auxiliar -</option>
		      	<option value="Raimundo">Raimundo</option>
		      	<option value="Antônio">Antônio</option>
		      	<option value="Fabiano">Fabiano</option>
		      	<option value="Flavio">Flavio</option>
		      	<option value="Adriano">Adriano</option>
		      	<option value="Cicero">Cicero</option>
		      	<option value="Ronaldo">Ronaldo</option>
		      	<option value="João Victor">João Victor</option>
		      	<option value="Marcos Antônio">Marcos Antônio</option>
		      <?php
		      //} 
		      ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Final:</label>
		    <div class="col">
		      <input type="time" class="form-control" name="horafinal" value="<?php echo gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
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
				      <input type="time" class="form-control" name="horafinal" value="<?php echo gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
				    </div>
				  </div>
				  <div class="form-group row">
					    <div class="col-auto my-1" style="width: 100%;">
					      <select class="custom-select mr-sm-2" name="manutentor2" >
					      <?php //if($fun->cargo === "2"){ ?>
					      	<option selected value="">- Manutentor Seguinte -</option>
					      	<option value="Enes">Enes</option>
					      	<option value="Pedro Pereira">Pedro Pereira</option>
					      	<option value="José Romão">José Romão</option>
					      	<option value="Erivaldo">Erivaldo</option>
					      	<option value="Osmar Guedes">Osmar Guedes</option>
					      	<option value="Pedro Gilson">Pedro Gilson</option>
					      	<option value="Prismapack">Prismapack</option>
					      <?php //} else {
					      	?>
					      	<option selected value="">- Manutentor Seguinte -</option>
					      	<option value="Raimundo">Raimundo</option>
					      	<option value="Antônio">Antônio</option>
					      	<option value="Fabiano">Fabiano</option>
					      	<option value="Flavio">Flavio</option>
					      	<option value="Adriano">Adriano</option>
					      	<option value="Cicero">Cicero</option>
		      				<option value="Ronaldo">Ronaldo</option>
					      	<option value="João Victor">João Victor</option>
					      	<option value="Marcos Antônio">Marcos Antônio</option>
					      <?php
					      //} 
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
				      <input type="time" class="form-control" name="horafinal2" value="<?php echo gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
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
		    <label style="margin-left:30px;">OS:</label>
		      <input type="text" class="form-control" name="os" value="<?php echo $d->id; ?>" >
		    </div>
		  </div>

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
		    <label style="margin-left:30px;">Parada:</label>
		      <input type="text" class="form-control" name="maquinaparada" value="<?php echo $d->maquinaparada ?>" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Status:</label>
		      <input type="text" class="form-control" name="status" value="<?php echo $d->status ?>" >
		    </div>
		  </div>

		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Assinatura:</label>
		      <input type="text" class="form-control" name="assinatura" value="<?php echo $d->assinatura ?>" >
		    </div>
		  </div>

		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">Hora Parada:</label>
		      <input type="time" class="form-control" name="horaparada" value="<?php echo date('H:i', strtotime($d->horaparada)); ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		    <div class="col">
		    <label style="margin-left:30px;">HH:</label>
		      <input type="time" class="form-control" name="hh" value="<?php echo date('H:i', strtotime($d->hh)); ?>">
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
        <div class="col-auto my-1" style="width: 95%;">
          <input type="text" class="form-control" name="solicitante" placeholder="Solicitante" >
        </div>
      </div>
      <div class="form-group row" style="display: none;">
        <div class="col-auto my-1" style="width: 95%;">
        	Prioridade:
          <select class="custom-select mr-sm-2" name="prioridade">
            <option value="Normal">Normal</option>
          </select>
        </div>
      </div>
      <div class="form-group row" style="display: none;">
        <div class="col-auto my-1" style="width: 95%;">
        	Função:
          <select class="custom-select mr-sm-2" name="funcao">

            <option Selected value="Manutenção">Manutenção</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-form-label" style="padding-left: 20px;">Data:</label>
        <div class="col-auto my-1" style="width: 92%;">
          <input  type="date" class="form-control" name="data" value="<?php echo date('Y-m-d'); ?>">
        </div>
      </div>
      <div class="form-group row ">
        <label for="inputPassword" class="col-form-label" style="padding-left: 20px;">Hora:</label>
        <div class="col-auto my-1" style="width: 92%;">
          <input  type="time" class="form-control" name="hora" value="<?php echo  gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="setormaq" >
            
            <?php
             // if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4"  or $fun->cargo === "5"){
            ?>
            <option selected value="Extrusão">Extrusão</option>
            <?php
              //} if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option selected value="Impressão">Impressão</option>
            <?php
              //} if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option selected value="Rebobinadeira">Rebobinadeira</option>
            <?php
              //} if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option selected value="Corte e Solda">Corte e Solda</option>
            <?php
              //} if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
             ?>
            <option selected value="Recuperadora">Recuperadora</option>
            <?php
              //} if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
             ?>
            <option selected value="Misturador">Misturador</option>
            <?php
             // } if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option value="Laminacao">Laminação</option>
            <?php
             // } if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option selected value="Casa de Tubetes">Casa de Tubetes</option>
            <?php
             // } if($fun->usuario === "qualidade" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option selected value="Qualidade">Qualidade</option>
            <?php
             // }
            ?>
            <option value="Outros">Auxiliares</option>
            <option value="Outros">Outros</option>
            <?php
            //  if($fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option selected value="" style="font-weight: bold;">- Setor Máquina -</option>
            <?php
         // }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="maquina" >
            <option selected value="" style="font-weight: bold;">- Máquina -</option>
            <?php 
           //   if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
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
             // } if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>

            <option value="FP4">FP4</option>
            <option value="FT1">FT1</option>
            <option value="FO1">FO1</option>
            <option value="FO2">FO2</option>
            <option value="FO3">FO3</option>
            <?php
             // } if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>

            <option value="Rebobinadeira 01">Rebobinadeira 01</option>
            <option value="Rebobinadeira 02">Rebobinadeira 02</option>
            <option value="Rebobinadeira 03">Rebobinadeira 03</option>
            <option value="Rebobinadeira 04">Rebobinadeira 04</option>
            <option value="Rebobinadeira 05">Rebobinadeira 05</option>
            <option value="Rebobinadeira 06">Rebobinadeira 06</option>
            <?php
            //  } if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>

            <option value="Corte e Solda 01">Corte e Solda 01</option>
            <option value="Corte e Solda 02">Corte e Solda 02</option>
            <option value="Corte e Solda 03">Corte e Solda 03</option>
            <option value="Corte e Solda 04">Corte e Solda 04</option>
            <option value="Corte e Solda 06">Corte e Solda 06</option>
            <option value="Corte e Solda 07">Corte e Solda 07</option>
            <option value="Corte e Solda 08">Corte e Solda 08</option>
            <?php
            //  } if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
             ?>

            <option value="Recuperadora 01">Recuperadora 01</option>
            <?php
            //  } if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
             ?>

            <option value="Misturador 01">Misturador 01</option>
            <option value="Misturador 02">Misturador 02</option>
            <option value="Misturador 03">Misturador 03</option>
            <option value="Misturador 04">Misturador 04</option>
            <option value="Misturador 05">Misturador 05</option>
            <option value="Misturador 06">Misturador 06</option>
            <?php
              //} if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>
            <option value="Tubete">Tubete</option>

            <?php
            //  } if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
            ?>

            <option value="Laminadora">Laminadora</option>
            <?php
            //  } if($fun->usuairo === "qualidade" or $fun->cargo === "4" or $fun->cargo === "5"){
              ?>
          <option value="Sala da qualidade">Sala da qualidade</option>
          <option value="Cabine do CQ">Cabine do CQ</option>
              <?php
             // }
            ?>
            <option value="Lavadora de Anilox">Lavadora de Anilox</option>
            <option value="Lavadora de Bomba de Tinta">Lavadora de Bomba de Tinta</option>
            <option value="Lavadora de Doctor Blade 01">Lavadora de Doctor Blade 01</option>
            <option value="Lavadora de Doctor Blade 02">Lavadora de Doctor Blade 02</option>
            <option value="Policorte">Policorte</option>
            <option value="Máquina de Cortar Tubete 01">Máquina de Cortar Tubete 01</option>
            <option value="Máquina de Cortar Tubete 02">Máquina de Cortar Tubete 02</option>
            <option value="Stretadeira 01">Stretadeira 01</option>
            <option value="Stretadeira 02">Stretadeira 02</option>
            <option value="Dosador Ext. 10">Dosador Ext. 10</option>
            <option value="Gerais Fábrica">Gerais Fábrica</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
        	Setor Manut.:
          <select class="custom-select mr-sm-2" name="setormanu" >
          	<?php// if($fun->cargo === '2'){ ?>
            <option selected value="Mecânica">Mecânica</option>
            <?php //} if($fun->cargo === '3'){ ?>
            <option selected value="Elétrica">Elétrica</option>
        	<?php// } ?>
          </select>
        </div>
      </div>
      <div class="form-group row" style="display: none;">
        <div class="col-auto my-1" style="width: 95%;">
        	Tipo Manut.:
          <select class="custom-select mr-sm-2" name="tipomanu" >
            <option selected value="Preventiva">Preventiva</option>
          </select>
        </div>
      </div>
      <div class="form-group row" style="display: none;">
        <div class="col-auto my-1" style="width: 95%;">
        	Conjunto:
          <select class="custom-select mr-sm-2" name="conjunto" >
            <option selected value="Geral">Geral</option>
            
          </select>
        </div>
      </div>
      <div class="form-group row" style="display: none;">
        <div class="col-auto my-1" style="width: 95%;">
        	Máq. Parada:
          <select class="custom-select mr-sm-2" name="maquinaparada" >
            <option selected="" value="Sim">Sim</option>
          </select>
        </div>
      </div>
       <div class="form-group row" style="display: none;">
        <div class="col-auto my-1" style="width: 95%;">
        	Serviço a realizar:
          <input type="text" class="form-control" name="falha" placeholder="Serviço a realizar:" value="Solicito a parada da máquina para realizar a manutenção preventiva." >
        </div>
      </div>
      <div class="" style="margin-left: 0;">
          <input type="hidden" name="notify" value="2">
          <button type="submit" class="btn btn-primary" style="width: 95%;">Enviar Solicitação</button>
          <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
        </div>
      </div>
    </form>
		<?php

		break;


		case 'add_ss':

		$fun = $_SESSION['logado'];
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_STRING);
		$maquina = filter_input(INPUT_POST, 'maquina', FILTER_SANITIZE_STRING);
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
		  <div class="form-group row" style="display: none;">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Prioridade</label>
		    <div class="col-auto my-1">
		      <select class="custom-select mr-sm-2" name="prioridade">
		      	<option Selected value="Normal">Normal</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row" style="display: none;">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Função</label>
		    <div class="col-auto my-1">
		      <select class="custom-select mr-sm-2" name="funcao">

		      	<option selected value="Manutenção">Manutenção</option>
		 
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
		      <input  type="time" class="form-control" name="hora" value="<?php echo gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
		    </div>
		  </div>
		  <div class="form-group row" style="display: none;">
		    <div class="col-auto my-1" style="width: 100%;">
		    	Setor Máq.:
		      <select class="custom-select mr-sm-2" name="setormaq" >
		      	
	          	 
            <option selected value="<?php echo $setor ?>"><?php echo $setor ?></option>
            
		      	
		      </select>
		    </div>
		  </div>
		  <div class="form-group row" style="display: none;">
		    <div class="col-auto my-1" style="width: 100%;">
		    	Máquina:
		      <select class="custom-select mr-sm-2" name="maquina" >

		      	<option Selected value="<?php echo $maquina ?>"><?php echo $maquina ?></option>
		      	
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		    	Setor Manut.:
		      <select class="custom-select mr-sm-2" name="setormanu" >
		      	
	          	<?php// if($fun->cargo === '2'){ ?>
	            <option selected value="Mecânica">Mecânica</option>
	            <?php //} if($fun->cargo === '3'){ ?>
	            <option selected value="Elétrica">Elétrica</option>
	        	<?php// } ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row" style="display: none;">
		    <div class="col-auto my-1" style="width: 100%;">
		    	Tipo Manut.:
		      <select class="custom-select mr-sm-2" name="tipomanu" >
		      	
		      	<option selected value="Preventiva">Preventiva</option>
	
		      </select>
		    </div>
		  </div>
		  <div class="form-group row" style="display: none;">
		    <div class="col-auto my-1" style="width: 100%;" >
		      <select class="custom-select mr-sm-2" name="conjunto" >
		      	<option selected value="-">- Conjunto -</option>
		      	<?php
		      		if($setor === "extrusão" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      	<option value=""><-- MECÂNICA EXTRUSÃO --></option>
		      	<option value="Alimentador e Funil">Alimentador e Funil</option>
		      	<option value="Alinhador">Alinhador</option>
		      	<option value="Anel de Ar">Anel de Ar</option>
		      	<option value="Cilindro Guia">Cilindro Guia</option>
		      	<option value="Gaiola">Gaiola</option>
		      	<option value="Moinho de Refile">Moinho de Refile</option>
		      	<option value="Motores do Trocador de Calor do Túnel">Motores do Trocador de Calor do Túnel</option>
		      	<option value="Puxador">Puxador</option>
		      	<option value="Redutor Motor Principal A">Redutor Motor Principal A</option>
		      	<option value="Redutor Motor Principal B">Redutor Motor Principal B</option>
		      	<option value="Redutor Motor Principal C">Redutor Motor Principal C</option>
		      	<option value="Saia e Sanfonado">Saia e Sanfonado</option>
		      	<option value="Sistema Pneumático">Sistema Pneumático</option>
		      	<option value="Unidade de Tratamento">Unidade de Tratamento</option>
		      	<option value="Bobinador">Bobinador</option>
		      	<option value="Hidro Pneumático">Hidro Pneumático</option>
		      	<option value=""><-- ELÉTRICA EXTRUSÃO --></option>
		      	<option value="Canhões">Canhões</option>
		      	<option value="Matriz">Matriz</option>
		      	<option value="Calibrador">Calibrador</option>
		      	<option value="Reversível">Reversível</option>
		      	<option value="Gaiola">Gaiola</option>
		      	<option value="Giratório">Giratório</option>
		      	<option value="Principal A">Principal A</option>
		      	<option value="Principal B">Principal B</option>
		      	<option value="Principal C">Principal C</option>
		      	<option value="Principal D">Principal D</option>
		      	<option value="Principal E">Principal E</option>
		      	<option value="Bobinadeiras">Bobinadeiras</option>
		      	<option value="Puxador">Puxador</option>
		      	<option value="Pré Arraste">Pré Arraste</option>
		      	<option value="Anel de Ar">Anel de Ar</option>
		      	<option value="Entrada de Ar">Entrada de Ar</option>
		      	<option value="Saída de Ar">Saída de Ar</option>
		      	<option value="Painéis">Painéis</option>
		      	<option value="Iluminação">Iluminação</option>
		      	<option value="Ventilação">Ventilação</option>
		      	<option value="Recuperadora de Refile">Recuperadora de Refile</option>
		      	<option value="Alinhador">Alinhador</option>
		      	<option value="Tratamento">Tratamento</option>
		      	<option value="Pressão de Massa">Pressão de Massa</option>
		      	<option value="Temperatura de Massa">Temperatura de Massa</option>
		      	<option value="Anti-Estática">Anti-Estática</option>
		      	<option value="Sistema de Segurança">Sistema de Segurança</option>
		      	<option value="Sistema Dosador">Sistema Dosador</option>
		      	<option value="Controlador de Espessura (K Design Karat)">Controlador de Espessura (K Design Karat)</option>
		      	<option value="Controlador de Espessura (Syncro)">Controlador de Espessura (Syncro)</option>
		      	<?php
		      		}

		      		if($setor === "impressão" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA IMPRESSÃO --></option>
		      		<option value="Tambor Central">Tambor Central</option>
		      		<option value="Desbobinador">Desbobinador</option>
		      		<option value="Rebobinador">Rebobinador</option>
		      		<option value="Balancinho">Balancinho</option>
		      		<option value="Calandra">Calandra</option>
		      		<option value="Sistema de Acionamento">Sistema de Acionamento</option>
		      		<option value="Unidade de Força Hidráulica">Unidade de Força Hidráulica</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value=""><-- ELÉTRICA IMPRESSÃO --></option>
		      		<option value="Painéis">Painéis</option>
		      		<option value="Bobinadeiras">Bobinadeiras</option>
		      		<option value="Aquecimento">Aquecimento</option>
		      		<option value="Calandra">Calandra</option>
		      		<option value="Sistema de Segurança">Sistema de Segurança</option>
		      		<option value="Principal">Principal</option>
		      		<option value="Iluminação">Iluminação</option>
		      		<option value="Tambor Central">Tambor Central</option>
		      		<option value="Talha Elétrica">Talha Elétrica</option>
		      		<option value="Vídeo Scam">Vídeo Scam</option>
		      		<option value="Desbobinador">Desbobinador</option>

		      	<?php
		      		}

		      		if($setor === "corte e solda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA CORTE E SOLDA --></option>
		      		<option value="Transporte de Saída">Transporte de Saída</option>
		      		<option value="Rolo Puxador">Rolo Puxador</option>
		      		<option value="Transporte deEntrada">Transporte de Entrada</option>
		      		<option value="Cabeçote Inferior">Cabeçote Inferior</option>
		      		<option value="Balancinho">Balancinho</option>
		      		<option value="Cabeçote Superior">Cabeçote Superior</option>
		      		<option value="Pescador">Pescador</option>
		      		<option value="Desbobinador">Desbobinador</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value="Ponte de Ar">Ponte de Ar</option>
		      		<option value=""><-- ELÉTRICA CORTE E SOLDA --></option>
		      		<option value="Controle">Controle</option>
		      		<option value="Potência">Potência</option>
		      		<option value="Aquecimento">Aquecimento</option>
		      		<option value="Anti-Estática">Anti-Estática</option>
		      		<option value="Sistema de Segurança">Sistema de Segurança</option>
		      	<?php
		      		}

		      		if($setor === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA REBOBINADEIRA --></option>
		      		<option value="Desbobinador">Desbobinador</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value="Rolo Puxador">Rolo Puxador</option>
		      		<option value="Rebobinador">Rebobinador</option>
		      		<option value=""><-- ELÉTRICA REBOBINADEIRA --></option>
		      		<option value="Controle">Controle</option>
		      		<option value="Potência">Potência</option>
		      		<option value="Alinhador">Alinhador</option>
		      		<option value="Sistema de Segurança">Sistema de Segurança</option>
		      	<?php
		      		}

		      		if($setor === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA RECUPERADORA --></option>
		      		<option value="Moinho">Moinho</option>
		      		<option value="Recuperação">Recuperação</option>
		      		<option value="Sistema Hidráulico">Sistema Hidráulico</option>
		      		<option value="Centrífuga">Centrífuga</option>
		      		<option value="Funil Dosador">Funil Dosador</option>
		      		<option value=""><-- ELÉTRICA RECUPERADORA --></option>
		      		<option value="Canhão">Canhão</option>
		      		<option value="Matriz">Matriz</option>
		      		<option value="Centrífuga">Centrífuga</option>
		      		<option value="Principal">Principal</option>
		      		<option value="Granulador">Granulador</option>
		      		<option value="Moinho">Moinho</option>
		      		<option value="Cremmer">Cremmer</option>
		      		<option value="Silo">Silo</option>
		      		<option value="Troca Telas">Troca Telas</option>
		      		<option value="Painéis">Painéis</option>
		      		<option value="Iluminação">Iluminação</option>
		      		<option value="Pressão de Massa">Pressão de Massa</option>
		      	<?php
		      		}

		      		if($setor === "misturador" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value=""><-- MECÂNICA MISTURADOR --></option>
		      		<option value="Mecânica">Mecânica</option>
		      		<option value="Sistema Pneumático">Sistema Pneumático</option>
		      		<option value=""><-- ELÉTRICA MISTURADOR --></option>
		      		<option value="Controle">Controle</option>
		      		<option value="Potência">Potência</option>
		      	<?php
		      		}

		      		if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value="Não possui">Não possui</option>
		      	<?php
		      		}

		      		if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value="Não possui">Não possui</option>
		      	<?php
		      		}

		      		if($fun->usuario === "qualidade" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5"){
		      	?>
		      		<option value="Não possui">Não possui</option>
		      	<?php
		      		}
		      	?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col">
		      <input type="text" class="form-control" name="falha" placeholder="Serviço a realizar" >
		    </div>
		  </div>
		  <div class="form-group row" style="display: none;">
		    <div class="col-auto my-1" style="width: 100%;">
		    	Máq. Parada:
		      <select class="custom-select mr-sm-2" name="maquinaparada" >
		      	<option selected value="Sim">Sim</option>
		      </select>
		    </div>
		  </div>
		  <input type="hidden" name="notify" value="<?php echo $id ?>">
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Solicitar Serviço Preventiva</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		</form>
		<?php
		break;

		//FINALIZAR SERVICO
		case 'finalizar_prev1':
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$dados = editprod($id);

		if (listarpedidos3($id)) { 
		
		?>	

		<div class="aviso"></div>
		<form action="" name="form_finalizarprev" method="post">
			<div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="manutentor" >
		      <?php// if($fun->cargo === "2"){ ?>
		      	<option selected value="">- Manutentor -</option>
		      	<option value="Enes">Enes</option>
		      	<option value="Pedro Pereira">Pedro Pereira</option>
		      	<option value="José Romão">José Romão</option>
		      	<option value="Osmar Guedes">Osmar Guedes</option>
		      	<option value="Erivaldo">Erivaldo</option>
		      	<option value="Pedro Gilson">Pedro Gilson</option>
		      	<option value="Prismapack">Prismapack</option>
		      <?php //} else {
		      	?>
		      	<option selected value="">- Manutentor -</option>
		      	<option value="Raimundo">Raimundo</option>
		      	<option value="Antônio">Antônio</option>
		      	<option value="Fabiano">Fabiano</option>
		      	<option value="Flavio">Flavio</option>
		      	<option value="Adriano">Adriano</option>
		      	<option value="Cicero">Cicero</option>
		      	<option value="Ronaldo">Ronaldo</option>
		      	<option value="João Victor">João Victor</option>
		      	<option value="Marcos Antônio">Marcos Antônio</option>
		      <?php
		     // } 
		      ?>
		      </select>
		    </div>
		  </div>
		   <div class="form-group row">
		    <div class="col-auto my-1" style="width: 100%;">
		      <select class="custom-select mr-sm-2" name="manutentor2" >
		      <?php //if($fun->cargo === "2"){ ?>
		      	<option selected value="">- Manutentor Auxiliar -</option>
		      	<option value="Enes">Enes</option>
		      	<option value="Pedro Pereira">Pedro Pereira</option>
		      	<option value="José Romão">José Romão</option>
		      	<option value="Osmar Guedes">Osmar Guedes</option>
		      	<option value="Erivaldo">Erivaldo</option>
		      	<option value="Pedro Gilson">Pedro Gilson</option>
		      	<option value="Prismapack">Prismapack</option>
		      <?php //} else {
		      	?>
		      	<option selected value="">- Manutentor Auxiliar -</option>
		      	<option value="Raimundo">Raimundo</option>
		      	<option value="Antônio">Antônio</option>
		      	<option value="Fabiano">Fabiano</option>
		      	<option value="Flavio">Flavio</option>
		      	<option value="Adriano">Adriano</option>
		      	<option value="Cicero">Cicero</option>
		      	<option value="Ronaldo">Ronaldo</option>
		      	<option value="João Victor">João Victor</option>
		      	<option value="Marcos Antônio">Marcos Antônio</option>
		      <?php
		      //} 
		      ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Data Final:</label>
		    <div class="col">
		      <input  type="date" class="form-control" name="datafinal" value="<?php echo date('Y-m-d'); ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Inicial:</label>
		    <div class="col">
		      <input type="time" class="form-control" name="horainicial" value="<?php echo gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
		    </div>
		  </div>

		  <div class="form-group row">
		  	<label for="inputPassword" class="col-sm-2 col-form-label">Hora Final:</label>
		    <div class="col">
		      <input type="time" class="form-control" name="horafinal" value="<?php echo gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ?>">
		    </div>
		  </div>
		  
		  <input type="hidden" id="id" data-id="<?php echo $dados->id; ?>" name="id" value="<?php echo $dados->id; ?>" />
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Atualizar Serviço</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  </div>
		  <div class="aviso2"></div>
		</form>
		<?php
		} else {
			echo '<b>Necessário finalizar as SS para finalizar a preventiva!</b>';
		}

		break;



		//AGUARDANDO PARADA
		case 'aguard_parada':
		$maquina = filter_input(INPUT_POST, 'maquina', FILTER_SANITIZE_STRING);
		?>
		<div class="aviso"></div>
		<form action="" name="form_aguardparada" method="post">
		  <div class="form-group row">
		   	<label style="margin-left:30px;font-size: 17px;"><strong>Este serviço está aguardando a parada da máquina?</strong></label>
		   	<label style="margin-top:15px;margin-left:30px;font-size: 15px;">"<?php echo $maquina; ?>"</label>
		  </div>
		  <div class="col-auto my-1">
		      <button type="submit" class="btn btn-primary">Sim</button>
		      <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
		    </div>
		  <br />
		</form>

		<?php
		break;


		
	default:
		echo 'nada';
		break;
}
ob_end_flush();
?>