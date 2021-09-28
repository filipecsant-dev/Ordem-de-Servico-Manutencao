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
   <script type="text/javascript" src="js/servpen20.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Serviços Pendentes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <button type="button" class="btn btn-sm btn-outline-secondary" id="notify" onclick="$('.my_audio').trigger('play'); somzero();">Ativar som em notificação</button>
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
              <th style="width: 300px;"><center>Ação</center></th>
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

<script type="text/javascript">
$(document).ready(function(){
    var click = 0;

    $('.btn-group').on("click", '#notify', function(){
    var tbody = $('.btn-group').find('#notify');

    if(click === 0){
      tbody.html('Som em notificação ativado!');
      click = 1;
    }
    
  });
});

  

  function somzero(){
    var audio = document.getElementById("audiov");
    audio.volume = 0.0;
  }

  function somativo(){
    var audio = document.getElementById("audiov");
    audio.volume = 1.0;

    setTimeout(function() {
      somzero();
   }, 3000);
  }


</script>
  <audio class="my_audio" id="audiov" loop>
    <source src="sound/notify.mp3" type="audio/ogg">
  </audio>