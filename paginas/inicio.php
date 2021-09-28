    <?php
    require 'funcoes/crud/crud.php';
    ?>
    <script type="text/javascript" src="js/inic.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php if($fun->empresa === 'norpack'){echo 'Norpack';} ?> - Sistema de Ordem de Serviço</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="https://wa.me/5571983409647?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20o%20aplicativo%20para%20Delivery!" target="_blank">Entrar em contato com o suporte</a>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <div style="font-size: 15px; font-family: Verdama, Arial;">
          <div><b>Mecânica:</b></div> 

          <b>Enes:</b> <?php if(localizarmanutentor("Enes")){$localizar = localizarmanutentor("Enes"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Pedro Pereira:</b>  <?php if(localizarmanutentor("Pedro Pereira")){$localizar = localizarmanutentor("Pedro Pereira"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>José Romão:</b>  <?php if(localizarmanutentor("José Romão")){$localizar = localizarmanutentor("José Romão"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Erivaldo:</b>  <?php if(localizarmanutentor("Erivaldo")){$localizar = localizarmanutentor("Erivaldo"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Osmar Guedes:</b>  <?php if(localizarmanutentor("Osmar Guedes")){$localizar = localizarmanutentor("Osmar Guedes"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Pedro Gilson:</b>  <?php if(localizarmanutentor("Pedro Gilson")){$localizar = localizarmanutentor("Pedro Gilson"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?>


          


          <div><b>Elétrica:</b> </div>

          <b>Raimundo:</b> <?php if(localizarmanutentor("Raimundo")){$localizar = localizarmanutentor("Raimundo"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Antônio:</b> <?php if(localizarmanutentor("Antônio")){$localizar = localizarmanutentor("Antônio"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Fabiano:</b> <?php if(localizarmanutentor("Fabiano")){$localizar = localizarmanutentor("Fabiano"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Adriano:</b> <?php if(localizarmanutentor("Adriano")){$localizar = localizarmanutentor("Adriano"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>João Victor:</b> <?php if(localizarmanutentor("João Victor")){$localizar = localizarmanutentor("João Victor"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?> <b>|</b>


          <b>Marcos Antônio:</b> <?php if(localizarmanutentor("Marcos Antônio")){$localizar = localizarmanutentor("Marcos Antônio"); foreach ($localizar as $loc) {echo $loc->maquina;}} else {echo "-";} ?>

        </div>
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
              <th><center>Status</center></th>
            </tr>
          </thead>
          <tbody>




      <script> 
      function listaros(){
        </script>
      <?php
           if (listarpedidos2()) { 
             $pedidos = listarpedidos2();
              foreach ($pedidos as $ped) {
                if($ped->status === "Aberta" OR $ped->status === "Em execução"){
        ?>
          <tr <?php if($ped->status === "Em execução"){echo 'style="background-color:#FFA500;"';} if($ped->maquinaparada === "Sim"){echo 'style="background-color:#FF6347;"';}  ?>>
                  <th style="padding-top:8px;"><center><?php echo $ped->id; ?></center></th>
                  <th><center><?php echo $ped->solicitante; ?></center></th>
                  <th><center><?php echo date('d/m/Y', strtotime($ped->data)); ?></center></th>
                  <th><center><?php echo $ped->hora; ?></center></th>
                  <th><center><?php echo $ped->funcao; ?></center></th>
                  <th><center><?php echo $ped->setormaq; ?></center></th>
                  <th><center><?php echo $ped->maquina; ?></center></th>
                  <th><center><?php echo $ped->setormanu; ?></center></th>
                  <th><center><?php echo $ped->tipomanu; ?></center></th>
                  <th><center><?php echo $ped->falha; ?></center></th>
                  <th><center><?php echo $ped->maquinaparada; ?></center></th>
                  <th><center><?php if($ped->manutentor === null){echo "-";}else{echo $ped->manutentor;} ?></center></th>
                  <th><center><?php echo $ped->status; ?></center></th>
                </tr>

      <?php

          }
        }
      }
      ?>
      <script>
    }
    </script>
      
          </tbody>
        </table>
      </div>
    </main>