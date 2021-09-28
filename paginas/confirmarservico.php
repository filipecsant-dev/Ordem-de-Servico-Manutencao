<?php
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
   <script type="text/javascript" src="js/confirmarservico90.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Confirmar Serviço</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="navbar-brand" style="background: none;">Filtrar por setor &nbsp;&nbsp;</div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <form class="form-inline my-2 my-lg-0" name="form_buscar2">
                  <select class="form-control mr-sm-2" id="search2">
                    <option selected value="">- Selecione -</option>
                    <option value="Extrusão">Extrusão</option>
                    <option value="Impressão">Impressão</option>
                    <option value="Rebobinadeira">Rebobinadeira</option>
                    <option value="Misturador">Misturador</option>
                    <option value="Corte e Solda">Corte e Solda</option>
                    <option value="Laminação">Laminação</option>
                    <option value="Recuperadora">Recuperadora</option>
                    <option value="Casa de Tubetes">Casa de Tubetes</option>
                    <option value="Outros">Outros</option>
                  </select>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar</button>
                </form>
              </div>
            </nav>
              
          </div>
        </div>
      </div>
      <div class="table-responsive"  style=" height: 510px;">


      <div id="asstd" style="font-size:20px; display: none;">Assinar todas OS deste setor: &nbsp;&nbsp;&nbsp;<button type="button" id="buttonasstd" class="btn btn-info" style="color:#fff;font-size:15px;">Confirmar</button>
      <img src="img/load2.gif" align="center" id="load3" style="width: 25px; height: 25px; margin-left:5px; margin-top:5px; display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      </div><br />


        <div class="aviso"></div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th><center>SS</center></th>
              <th><center>Solicitante</center></th>
              <th><center>Data</center></th>
              <th><center>Hora</center></th>
              <th><center>Função</center></th>
              <th><center>Setor Máquina</center></th>
              <th><center>Máquina</center></th>
              <th><center>Setor Manutenção</center></th>
              <th><center>Tipo Manutenção</center></th>
              <th><center>Falha</center></th>
              <th><center>Maquina Parada</center></th>
              <th><center>Status</center></th>
              <th><center>Data Final</center></th>
              <th><center>Manutentor</center></th>
              <th><center>Servico</center></th>
              <th><center>Selecionar</center></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="16"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
            </tr>
          </tbody>
        </table>
        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Cadastro de Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"></div>
            </div>
          </div>
        </div>
      </div>
    </main>