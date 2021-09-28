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
    <script type="text/javascript" src="js/todosservic2.js"></script>
    <style type="text/css">
      .active{
        font-weight: bold;
      }
    </style>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
           <div class="btn-group mr-2">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="navbar-brand" style="background: none;">Selecione a forma de busca &nbsp;&nbsp;</div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item" id="buscaos2">
                    <a class="nav-link" style="cursor:pointer;" id="buscaos">Numero de SS</a>
                  </li>
                  <li class="nav-item" id="buscamaquina2">
                    <a class="nav-link" style="cursor:pointer;" id="buscamaquina">Máquina</a>
                  </li>
                  <li class="nav-item" id="buscastatus2">
                    <a class="nav-link" style="cursor:pointer;" id="buscastatus">Status</a>
                  </li>
                  <li class="nav-item" id="buscamanutentor2">
                    <a class="nav-link" style="cursor:pointer;" id="buscamanutentor">Manutentor</a>
                  </li>
                  <li class="nav-item" id="buscaparada2">
                    <a class="nav-link" style="cursor:pointer;" id="buscaparada">Máq. Parada</a>
                  </li>
                </ul>
                <input type="hidden" id="forma" value="" />
                <form class="form-inline my-2 my-lg-0" name="form_buscar">
                  <input class="form-control mr-sm-2" id="search" type="search" placeholder="Informe os dados">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
                </form>
              </div>
            </nav>

          </div>
        </div>
      </div>
      <div class="aviso"></div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <div style="font-size:15px;font-weight: bold;margin-bottom: 10px;text-align: center;">Lista de todos os serviços</div>
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
              <th><center>Visualizar</center></th>
            </tr>
          </thead>
          <tbody>
            <td colspan="13"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
          </tbody>
        </table>
      </div>
      <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Solicitação de OS</h5>
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