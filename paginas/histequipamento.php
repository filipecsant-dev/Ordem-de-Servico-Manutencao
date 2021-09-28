   <script type="text/javascript" src="js/histequi2.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Histórico de Equipamentos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <div class="aviso"></div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th><center>Mês</center></th>
<!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>Ext. 01</center></th>
              <th><center>Ext. 02</center></th>
              <th><center>Ext. 03</center></th>
              <th><center>Ext. 04</center></th>
              <th><center>Ext. 05</center></th>
              <th><center>Ext. 06</center></th>
              <th><center>Ext. 07</center></th>
              <th><center>Ext. 08</center></th>
              <th><center>Ext. 09</center></th>
              <th><center>Ext. 10</center></th>
<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>FP4</center></th>
              <th><center>FT1</center></th>
              <th><center>FO1</center></th>
              <th><center>FO2</center></th>
              <th><center>FO3</center></th>
<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>Reb. 01</center></th>
              <th><center>Reb. 02</center></th>
              <th><center>Reb. 03</center></th>
              <th><center>Reb. 04</center></th>
              <th><center>Reb. 05</center></th>
              <th><center>Reb. 06</center></th>
<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>C.S. 01</center></th>
              <th><center>C.S. 02</center></th>
              <th><center>C.S. 03</center></th>
              <th><center>C.S. 04</center></th>
              <th><center>C.S. 06</center></th>
              <th><center>C.S. 07</center></th>
              <th><center>C.S. 08</center></th>
<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>REC. 01</center></th>
<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>MIST. 01</center></th>
              <th><center>MIST. 02</center></th>
              <th><center>MIST. 03</center></th>
              <th><center>MIST. 04</center></th>
              <th><center>MIST. 05</center></th>
              <th><center>MIST. 06</center></th>
             
            </tr>
          </thead>
          <tbody>
            <tr>
              <th><center>Janeiro</center></th>

<!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="01" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-manu="<?php echo $fun->cargo; ?>" data-id="01" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>
            </tr>





            <tr>
              <th><center>Fevereiro</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="02" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="02" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="02" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="02" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="02" data-manu="<?php echo $fun->cargo; ?>" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-manu="<?php echo $fun->cargo; ?>" data-id="02" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;"></button>
                  </center></th>


            </tr>
      

            <tr>
              <th><center>Março</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>
 

<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="03" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Abril</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="04" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Maio</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="05" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Junho</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="06" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Julho</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="07" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Agosto</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="08" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Setembro</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="09" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Outubro</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="10" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Novembro</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="11" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

            <tr>
              <th><center>Dezembro</center></th>
              <!-- /////////////////////////////////////////////// EXTRUSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 01" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 02" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 03" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 04" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 05" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 06" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 07" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 08" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 09" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Extrusora 10" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


<!-- /////////////////////////////////////////////// IMPRESSAO ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FP4" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FT1" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO1" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO2" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="FO3" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// REBOBINADEIRA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 01" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 02" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 03" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 04" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 05" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Rebobinadeira 06" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// CORTE E SOLDA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 01" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 02" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 03" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 04" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 06" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 07" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Corte e Solda 08" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// RECUPERADORA ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Recuperadora 01" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

<!-- /////////////////////////////////////////////// MISTURADOR ////////////////////////////////////////////////// -->
              <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 01" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 02" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 03" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 04" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 05" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>

                  <th><center>
                    <button type="button" id="imprimir_hist" data-maq="Misturador 06" data-id="12" class="btn btn-warning" style="background-image: url(img/impressora.png); width: 50px;height: 35px;" data-manu="<?php echo $fun->cargo; ?>"></button>
                  </center></th>


            </tr>

          </tbody>
        </table>
      </div>
    </main>