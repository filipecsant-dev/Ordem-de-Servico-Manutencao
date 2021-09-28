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

    var ctx = document.getElementById('MIST01').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Misturador 01 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Misturador 01");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Misturador 01");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Misturador 01");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Misturador 01");?>', '<?= relatoriocon("2021-05-01","2021-06-01", "Misturador 01");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Misturador 01");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Misturador 01");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Misturador 01");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Misturador 01");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Misturador 01");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Misturador 01");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Misturador 01");?>']
            }]
        },

        options: {}
    });
//------------------------------- FT01 --------------------------------------------
    var ctx = document.getElementById('MIST02').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Misturador 02 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Misturador 02");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Misturador 02");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Misturador 02");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Misturador 02");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Misturador 02");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Misturador 02");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Misturador 02");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Misturador 02");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Misturador 02");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Misturador 02");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Misturador 02");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Misturador 02");?>']
            }]
        },

        options: {}
    });

//------------------------------- Misturador 03 --------------------------------------------
    var ctx = document.getElementById('MIST03').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Misturador 03 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Misturador 03");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Misturador 03");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Misturador 03");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Misturador 03");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Misturador 03");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Misturador 03");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Misturador 03");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Misturador 03");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Misturador 03");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Misturador 03");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Misturador 03");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Misturador 03");?>']
            }]
        },

        options: {}
    });

//------------------------------- Misturador 04 --------------------------------------------
    var ctx = document.getElementById('MIST04').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Misturador 04 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Misturador 04");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Misturador 04");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Misturador 04");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Misturador 04");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Misturador 04");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Misturador 04");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Misturador 04");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Misturador 04");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Misturador 04");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Misturador 04");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Misturador 04");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Misturador 04");?>']
            }]
        },

        options: {}
    });

    //------------------------------- Misturador 05 --------------------------------------------
    var ctx = document.getElementById('MIST05').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Misturador 05 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Misturador 05");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Misturador 05");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Misturador 05");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Misturador 05");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Misturador 05");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Misturador 05");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Misturador 05");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Misturador 05");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Misturador 05");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Misturador 05");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Misturador 05");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Misturador 05");?>']
            }]
        },

        options: {}
    });

    //------------------------------- Misturador 06 --------------------------------------------
    var ctx = document.getElementById('MIST06').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Misturador 06 (Anual)',
                backgroundColor: '#1e81b0',
                borderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                borderWidth: 3,
                data: ['<?= relatoriocon("2021-01-01","2021-02-01", "Misturador 06");?>', '<?= relatoriocon("2021-02-01","2021-03-01", "Misturador 06");?>', '<?= relatoriocon("2021-03-01","2021-04-01", "Misturador 06");?>', '<?= relatoriocon("2021-04-01","2021-05-01", "Misturador 06");?>', '<?= relatoriocon("2021-05-01","2021-06-02", "Misturador 06");?>', '<?= relatoriocon("2021-06-01","2021-07-01", "Misturador 06");?>', '<?= relatoriocon("2021-07-01","2021-08-01", "Misturador 06");?>', '<?= relatoriocon("2021-08-01","2021-09-01", "Misturador 06");?>', '<?= relatoriocon("2021-09-01","2021-10-01", "Misturador 06");?>', '<?= relatoriocon("2021-10-01","2021-11-01", "Misturador 06");?>', '<?= relatoriocon("2021-11-01","2021-12-01", "Misturador 06");?>', '<?= relatoriocon("2021-12-01","2022-01-01", "Misturador 06");?>']
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
        <h1 class="h2">Horas Paradas - Corte e Solda</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" id="imprimir" class="btn btn-sm btn-outbar-secondary">Imprimir Relatório</button>
          </div>
        </div>
      </div>


      <canvas class="my-4 w-100" id="MIST01" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="MIST02" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="MIST03" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="MIST04" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="MIST05" width="900" height="380"></canvas>
      <canvas class="my-4 w-100" id="MIST06" width="900" height="380"></canvas>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>