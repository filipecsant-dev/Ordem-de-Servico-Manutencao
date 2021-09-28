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
   <script type="text/javascript" src="js/aguardparada.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Serviços Aguardando Parada de Máquina</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>
      <div class="table-responsive">
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
              <th><center>Manutentor</center></th>
              <th style="width: 180px;"><center>Ação</center></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="13"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
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

