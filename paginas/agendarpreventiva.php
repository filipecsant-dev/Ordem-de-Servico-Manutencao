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
    <script type="text/javascript" src="js/agendarprev4.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Agendar de Preventiva</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
           <div class="btn-group mr-2">
             <button type="button" class="btn btn-sm btn-outline-secondary" id="cadprev">Adicionar Preventiva</button>
          </div>
        </div>
      </div>
      <div class="aviso"></div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th><center>Ficha Téc.</center></th>
              <th><center>Ver SS's</center></th>
              <th><center>Setor Manut.</center></th>
              <th><center>Máquina</center></th>
              <th><center>Motivo</center></th>
              <th><center>Data de Início</center></th>
              <th><center>Data de Término</center></th>
              <th><center>Status</center></th>
              <th style="width: 200px;"><center>Ação</center></th>
            </tr>
          </thead>
          <tbody>
            <td colspan="9"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
          </tbody>
        </table>
      </div>
      <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Adicionar Preventiva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"></div>
            </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado2">SS's Preventiva</h5>
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