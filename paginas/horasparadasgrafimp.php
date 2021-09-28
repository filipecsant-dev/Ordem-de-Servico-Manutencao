<?php
  require 'funcoes/crud/crud.php';

  if($fun->cargo === '1'){
    header("Location: painel.php");
  }
  function relatoriocon($data1, $data2, $maquina){
    $horaparada = 0;
    if(relatoriocon2($data1, $data2, $maquina)){
      $relatorioconn = relatoriocon2($data1, $data2, $maquina);
      foreach($relatorioconn as $rel){
        $horaparada += $rel->horaparada;
      }
    }
    return $horaparada;
  }
?>

  <script type="text/javascript">
    $(document).ready(function(){

    var ctx = document.getElementById('FP4').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'FP4 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "FP4");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "FP4");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "FP4");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "FP4");?>', '<?= relatoriocon("2021-05-01","2021-06-01", "FP4");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "FP4");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "FP4");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "FP4");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "FP4");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "FP4");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "FP4");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "FP4");?>']
            }]
        },

        options: {}
    });
//------------------------------- FT01 --------------------------------------------
    var ctx = document.getElementById('FT1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'FT1 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "FT1");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "FT1");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "FT1");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "FT1");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "FT1");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "FT1");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "FT1");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "FT1");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "FT1");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "FT1");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "FT1");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "FT1");?>']
            }]
        },

        options: {}
    });

//------------------------------- FO1 --------------------------------------------
    var ctx = document.getElementById('FO1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'FO1 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "FO1");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "FO1");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "FO1");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "FO1");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "FO1");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "FO1");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "FO1");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "FO1");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "FO1");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "FO1");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "FO1");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "FO1");?>']
            }]
        },

        options: {}
    });

//------------------------------- FO2 --------------------------------------------
    var ctx = document.getElementById('FO2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'FO2 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "FO2");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "FO2");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "FO2");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "FO2");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "FO2");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "FO2");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "FO2");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "FO2");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "FO2");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "FO2");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "FO2");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "FO2");?>']
            }]
        },

        options: {}
    });

    //------------------------------- FO3 --------------------------------------------
    var ctx = document.getElementById('FO3').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'FO3 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "FO3");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "FO3");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "FO3");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "FO3");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "FO3");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "FO3");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "FO3");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "FO3");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "FO3");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "FO3");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "FO3");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "FO3");?>']
            }]
        },

        options: {}
    });

  

    $('.btn-group').on('click', '#imprimir', function(){
      window.print();
    });

  });


  function attrelatorio(url,acao,data){
    $.post(url, {acao: acao, data: data}, function(retorno){
      var tbody = $('.table').find('tbody');
      var load = tbody.find('#load');

      tbody.html(retorno);
    });
  }

  </script>



    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Horas Paradas - Impressão</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" id="imprimir" class="btn btn-sm btn-outbar-secondary">Imprimir Relatório</button>
          </div>
        </div>
      </div>


      <canvas class="my-4 w-100" id="FP4" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="FT1" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="FO1" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="FO2" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="FO3" width="900" height="380"></canvas>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>