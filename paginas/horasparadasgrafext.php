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

    var ctx = document.getElementById('ext01').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 01 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 01");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 01");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 01");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 01");?>', '<?= relatoriocon("2021-05-01","2021-06-01", "Extrusora 01");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 01");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 01");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 01");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 01");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 01");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 01");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 01");?>']
            }]
        },

        options: {}
    });
//------------------------------- EXTRUSORA 02 --------------------------------------------
    var ctx = document.getElementById('ext02').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 02 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 02");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 02");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 02");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 02");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 02");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 02");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 02");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 02");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 02");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 02");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 02");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 02");?>']
            }]
        },

        options: {}
    });

//------------------------------- EXTRUSORA 03 --------------------------------------------
    var ctx = document.getElementById('ext03').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 03 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 03");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 03");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 03");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 03");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 03");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 03");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 03");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 03");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 03");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 03");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 03");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 03");?>']
            }]
        },

        options: {}
    });

//------------------------------- EXTRUSORA 04 --------------------------------------------
    var ctx = document.getElementById('ext04').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 04 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 04");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 04");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 04");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 04");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 04");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 04");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 04");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 04");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 04");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 04");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 04");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 04");?>']
            }]
        },

        options: {}
    });

    //------------------------------- Extrusora 05 --------------------------------------------
    var ctx = document.getElementById('ext05').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 05 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 05");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 05");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 05");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 05");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 05");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 05");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 05");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 05");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 05");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 05");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 05");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 05");?>']
            }]
        },

        options: {}
    });

    //------------------------------- Extrusora 06 --------------------------------------------
    var ctx = document.getElementById('ext06').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 06 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 06");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 06");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 06");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 06");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 06");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 06");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 06");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 06");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 06");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 06");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 06");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 06");?>']
            }]
        },

        options: {}
    });


    //------------------------------- Extrusora 07 --------------------------------------------
    var ctx = document.getElementById('ext07').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 07 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 07");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 07");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 07");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 07");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 07");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 07");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 07");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 07");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 07");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 07");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 07");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 07");?>']
            }]
        },

        options: {}
    });

    //------------------------------- Extrusora 08 --------------------------------------------
    var ctx = document.getElementById('ext08').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 08 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 08");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 08");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 08");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 08");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 08");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 08");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 08");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 08");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 08");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 08");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 08");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 08");?>']
            }]
        },

        options: {}
    });

    //------------------------------- Extrusora 09 --------------------------------------------
    var ctx = document.getElementById('ext09').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 09 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 09");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 09");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 09");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 09");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 09");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 09");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 09");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 09");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 09");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 09");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 09");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 09");?>']
            }]
        },

        options: {}
    });

    //------------------------------- Extrusora 10 --------------------------------------------
    var ctx = document.getElementById('ext10').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Extrusora 10 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Extrusora 10");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Extrusora 10");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Extrusora 10");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Extrusora 10");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Extrusora 10");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Extrusora 10");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Extrusora 10");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Extrusora 10");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Extrusora 10");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Extrusora 10");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Extrusora 10");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Extrusora 10");?>']
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
        <h1 class="h2">Horas Paradas - Extrusão</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" id="imprimir" class="btn btn-sm btn-outbar-secondary">Imprimir Relatório</button>
          </div>
        </div>
      </div>


      <canvas class="my-4 w-100" id="ext01" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext02" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext03" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext04" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext05" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext06" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext07" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext08" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext09" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="ext10" width="900" height="380"></canvas>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>