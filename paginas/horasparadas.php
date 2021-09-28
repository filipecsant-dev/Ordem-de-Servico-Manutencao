<?php
  require 'funcoes/crud/crud.php';

  if($fun->cargo === '1'){
    header("Location: painel.php");
  }
?>

    <script type="text/javascript">
     $(document).ready(function(){
        $('.btn-group').on('click', '#imprimir', function(){
      window.print();
    });

  });

    </script>


    <script type="text/javascript" src="js/horasparadas8.js"></script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Horas Paradas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" id="imprimir" class="btn btn-sm btn-outline-secondary">Imprimir Relatório</button>
          </div>
        </div>
      </div>
      <table class="table table-striped table-sm ext">
          <thead>
            <tr>
              <th colspan="12"><center>EXTRUSÃO <a style="float:right;margin-right: 100px;" href="?p=horasparadasgrafext">( Visualizar Gráfico )</a></button></center></th>
            </tr>
            <tr>
                 <th>Mês</th> <th>Extrusora 01</th> <th>Extrusora 02</th> <th>Extrusora 03</th> <th>Extrusora 04</th> <th>Extrusora 05</th> <th>Extrusora 06</th> <th>Extrusora 07</th> <th>Extrusora 08</th> <th>Extrusora 09</th> <th>Extrusora 10</th> <th>Total</th> 
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="12"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
            </tr>
          </tbody>

        </table>

<br /><br /><br />

         <table class="table table-striped table-sm imp">
          <thead>
            <tr>
              <th colspan="7"><center>IMPRESSÃO <a style="float:right;margin-right: 100px;" href="?p=horasparadasgrafimp">( Visualizar Gráfico )</a></button></center></th>
            </tr>
            <tr>
                 <th>Mês</th> <th><center>FLEXO POWER 04</center></th> <th><center>FLEXO TECH 01</center></th> <th><center>FLEXO ONE 01</center></th> <th><center>FLEXO ONE 02</center></th> <th><center>FLEXO ONE 03</center></th> <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="7"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
            </tr>
          </tbody>

        </table>

<br /><br /><br />

        <table class="table table-striped table-sm reb">
          <thead>
            <tr>
              <th colspan="8"><center>REBOBINADEIRA <a style="float:right;margin-right: 100px;" href="?p=horasparadasgrafreb">( Visualizar Gráfico )</a></button></center></th>
            </tr>
            <tr>
                 <th>Mês</th> <th>REBOBINADEIRA 01</th> <th>REBOBINADEIRA 02</th> <th>REBOBINADEIRA 03</th> <th>REBOBINADEIRA 04</th> <th><center>REBOBINADEIRA 05</center></th> <th>REBOBINADEIRA 06</th>  <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="8"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
            </tr>
          </tbody>

        </table>

<br /><br /><br />

        <table class="table table-striped table-sm cs">
          <thead>
            <tr>
              <th colspan="9"><center>CORTE E SOLDA <a style="float:right;margin-right: 100px;" href="?p=horasparadasgrafcs">( Visualizar Gráfico )</a></button></center></th>
            </tr>
            <tr>
                 <th>Mês</th> <th>CORTE E SOLDA 01</th> <th>CORTE E SOLDA 02</th> <th>CORTE E SOLDA 03</th> <th>CORTE E SOLDA 04</th> <th>CORTE E SOLDA 06</th> <th>CORTE E SOLDA 07</th> <th>CORTE E SOLDA 08</th>  <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="9"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
            </tr>
          </tbody>

        </table>

<br /><br /><br />

        <table class="table table-striped table-sm mist">
          <thead>
            <tr>
              <th colspan="8"><center>MISTURADOR <a style="float:right;margin-right: 100px;" href="?p=horasparadasgrafmist">( Visualizar Gráfico )</a></button></center></th>
            </tr>
            <tr>
                 <th>Mês</th> <th>MISTURADOR 01</th> <th>MISTURADOR 02</th> <th>MISTURADOR 03</th> <th>MISTURADOR 04</th> <th>MISTURADOR 05</th> <th>MISTURADOR 06</th>  <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="8"><center><img src="img/load.gif" align="center" id="load" style="width: 270px; height: 50px;"></center></td>
            </tr>
          </tbody>

        </table>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>