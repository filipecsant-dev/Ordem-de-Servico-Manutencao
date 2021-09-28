      <?php
            $fun = $_SESSION['logado'];
	    date_default_timezone_set('America/Sao_Paulo');


/*
$minhadatav = date('d/m/Y');
$datafinalv = '03/05/2022';
if($minhadatav > $datafinalv){
  session_destroy();
  header("Location: erro.php");
}
*/

      ?> 
    <script type="text/javascript" src="js/solicitaross23.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Solicitar novo serviço</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
           <div class="btn-group mr-2">
          </div>
        </div>
      </div>
      <div class="aviso"></div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            
          </thead>
          <tbody>



    <form action="" name="form_cadserv" method="post">
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <input type="text" class="form-control" name="solicitante" placeholder="Solicitante" >
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="prioridade">
            <option selected value="" style="font-weight: bold;">- Prioridade -</option>
            <option value="Urgente">Urgente</option>
            <option value="Normal">Normal</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="funcao">
            <?php
            if($fun->usuario != 'qualidade' && $fun->usuario != 'administracao'){
            ?>
            <option selected value="" style="font-weight: bold;">- Função -</option>
            <option value="Operador">Operador</option>
            <option value="Lider">Lider</option>
            <option value="Supervisor">Supervisor</option>
            <?php
            } else {  
              ?>
              <option selected value="" style="font-weight: bold;">- Função -</option>
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
        <label for="inputPassword" class="col-form-label" style="padding-left: 20px;">Data:</label>
        <div class="col-auto my-1" style="width: 92%;">
          <input  type="date" class="form-control" name="data" value="<?php echo date('Y-m-d'); ?>">
        </div>
      </div>
      <div class="form-group row ">
        <label for="inputPassword" class="col-form-label" style="padding-left: 20px;">Hora:</label>
        <div class="col-auto my-1" style="width: 92%;">
          <input  type="time" class="form-control" name="hora" value="<?php echo  gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('00:00') ) ); ?>">
          <?php //gmdate('H:i', abs( strtotime( date('H:i')) - strtotime('01:00') ) ); ADIANTA 1 HR ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
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
            <option selected value="" style="font-weight: bold;">- Setor Máquina -</option>
            <?php
          }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="maquina" >
            <option selected value="" style="font-weight: bold;">- Máquina -</option>
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
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="setormanu" >
            <option selected value="" style="font-weight: bold;">- Setor Manutenção -</option>
            <option value="Mecânica">Mecânica</option>
            <option value="Elétrica">Elétrica</option>
            <option value="Eletromecânica">Eletromecânica</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="tipomanu" >
            <option selected value="" style="font-weight: bold;">- Tipo Manutenção -</option>
            <option value="Corretiva">Corretiva</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="conjunto" >
            <option selected value="" style="font-weight: bold;">- Conjunto -</option>
            <?php
              if($fun->usuario === "extrusao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
            ?>
            <option value="" style="font-weight: bold;"><-- MECÂNICA --></option>
            <option value=""></option>
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
            <option value=""></option>
            <option value="" style="font-weight: bold;"><-- ELÉTRICA --></option>
            <option value=""></option>
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

              if($fun->usuario === "impressao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
            ?>
              <option value="" style="font-weight: bold;"><-- MECÂNICA --></option>
              <option value="Tambor Central">Tambor Central</option>
              <option value="Desbobinador">Desbobinador</option>
              <option value="Rebobinador">Rebobinador</option>
              <option value="Balancinho">Balancinho</option>
              <option value="Calandra">Calandra</option>
              <option value="Sistema de Acionamento">Sistema de Acionamento</option>
              <option value="Unidade de Força Hidráulica">Unidade de Força Hidráulica</option>
              <option value="Sistema Pneumático">Sistema Pneumático</option>
              <option value=""></option>
              <option value="" style="font-weight: bold;"><-- ELÉTRICA --></option>
              <option value=""></option>
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

              if($fun->usuario === "cortesolda" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
            ?>
              <option value="" style="font-weight: bold;"><-- MECÂNICA --></option>
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
              <option value=""></option>
              <option value="" style="font-weight: bold;"><-- ELÉTRICA --></option>
              <option value=""></option>
              <option value="Controle">Controle</option>
              <option value="Potência">Potência</option>
              <option value="Aquecimento">Aquecimento</option>
              <option value="Anti-Estática">Anti-Estática</option>
              <option value="Sistema de Segurança">Sistema de Segurança</option>
            <?php
              }

              if($fun->usuario === "rebobinadeira" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
            ?>
              <option value="" style="font-weight: bold;"><-- MECÂNICA --></option>
              <option value="Desbobinador">Desbobinador</option>
              <option value="Sistema Pneumático">Sistema Pneumático</option>
              <option value="Rolo Puxador">Rolo Puxador</option>
              <option value="Rebobinador">Rebobinador</option>
              <option value=""></option>
              <option value="" style="font-weight: bold;"><-- ELÉTRICA --></option>
              <option value=""></option>
              <option value="Controle">Controle</option>
              <option value="Potência">Potência</option>
              <option value="Alinhador">Alinhador</option>
              <option value="Sistema de Segurança">Sistema de Segurança</option>
            <?php
              }

              if($fun->usuario === "recuperadora" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
            ?>
              <option value="" style="font-weight: bold;"><-- MECÂNICA --></option>
              <option value="Moinho">Moinho</option>
              <option value="Recuperação">Recuperação</option>
              <option value="Sistema Hidráulico">Sistema Hidráulico</option>
              <option value="Centrífuga">Centrífuga</option>
              <option value="Funil Dosador">Funil Dosador</option>
              <option value=""></option>
              <option value="" style="font-weight: bold;"><-- ELÉTRICA --></option>
              <option value=""></option>
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

              if($fun->usuario === "misturador" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
            ?>
              <option value="" style="font-weight: bold;"><-- MECÂNICA --></option>
              <option value="Mecânica">Mecânica</option>
              <option value="Sistema Pneumático">Sistema Pneumático</option>
              <option value=""></option>
              <option value="" style="font-weight: bold;"><-- ELÉTRICA --></option>
              <option value=""></option>
              <option value="Controle">Controle</option>
              <option value="Potência">Potência</option>
            <?php
              }

              if($fun->usuario === "laminacao" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
            ?>
              <option value="Não possui">Não possui</option>
            <?php
              }

              if($fun->usuario === "casatubetes" or $fun->usuario === "mecanica" or $fun->usuario === "eletrica" or $fun->cargo === "4" or $fun->cargo === "5" && $fun->usuario != 'administracao'){
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
        <div class="col-auto my-1" style="width: 95%;">
          <select class="custom-select mr-sm-2" name="maquinaparada" >
            <option selected value="" style="font-weight: bold;">- Máquina Parada -</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
          </select>
        </div>
      </div>
       <div class="form-group row">
        <div class="col-auto my-1" style="width: 95%;">
          <input type="text" class="form-control" name="falha" placeholder="Falha" >
        </div>
      </div>
      <div class="" style="margin-left: 0;">
          <input type="hidden" name="notify" value="0">
          <button type="submit" class="btn btn-primary" style="width: 95%;">Enviar Solicitação</button>
          <img src="img/load2.gif" align="center" id="load" style="display:none; width: 30px;">
        </div>
      </div>
    </form>
            
          </tbody>
        </table>
      </div>
      </div>
    </main>