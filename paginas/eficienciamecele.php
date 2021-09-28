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
<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');



function relatoriocon($data1, $data2, $manutentor){
      $horaparada = "00:00:00";
        if(relatoriomecele($data1, $data2, $manutentor)){
          $relatorioconn = relatoriomecele($data1, $data2, $manutentor);
          foreach($relatorioconn as $rel){
            if($rel->maquinaparada === "Sim" && $rel->horaparada != null){

              $hp = date('H:i:s', strtotime($rel->horaparada));
          //cria um array com as horas trabalhadas ai quando quiser adicionar mais uma hora nesse array fica mole
          $tempos = array(
          $horaparada,
          $hp,
          );
          //inicializa a variavel segundos com 0
          $segundos = 0;

          foreach ($tempos as $tempo){ //percorre o array $tempo
            list( $h, $m, $s ) = explode( ':', $tempo ); //explode a variavel tempo e coloca as horas em $h, minutos em $m, e os segundos em $s

            //transforma todas os valores em segundos e add na variavel segundos

            $segundos += $h * 3600;
            $segundos += $m * 60;
            $segundos += $s;

          }

          $horas = floor( $segundos / 3600 ); //converte os segundos em horas e arredonda caso nescessario
          $segundos %= 3600; // pega o restante dos segundos subtraidos das horas
          $minutos = floor( $segundos / 60 );//converte os segundos em minutos e arredonda caso nescessario
          $segundos %= 60;// pega o restante dos segundos subtraidos dos minutos

          $horaparada = "{$horas}:{$minutos}:{$segundos}";
              }
          }
        }
        return $horaparada;
      }

      function porcentagem($enes){
         $horaparada = "00:00:00";
          //cria um array com as horas trabalhadas ai quando quiser adicionar mais uma hora nesse array fica mole
          $tempos = array(
          $horaparada,
          $enes
          );
          //inicializa a variavel segundos com 0
          $segundos = 0;

          foreach ($tempos as $tempo){ //percorre o array $tempo
            list( $h, $m, $s ) = explode( ':', $tempo ); //explode a variavel tempo e coloca as horas em $h, minutos em $m, e os segundos em $s

            //transforma todas os valores em segundos e add na variavel segundos

            $segundos += $h * 3600;

          }

          $horas = floor( $segundos / 3600 ); //converte os segundos em horas e arredonda caso nescessario

          $total = "{$horas}";

          $totalmensal = (8 * 5) * 4; //QUANTIDADE DE TRABALHO MENSAL

          $meta = ($total * 100) / $totalmensal;    

          $metafinal = round($meta, 0);


          return $metafinal."%";
      }



      $enes09 = relatoriocon("2021-02-01","2021-10-01", "Enes");
      $pedrop09 = relatoriocon("2021-02-01","2021-10-01", "Pedro Pereira");
      $romao09 = relatoriocon("2021-02-01","2021-10-01", "José Romão");
      $erivaldo09 = relatoriocon("2021-02-01","2021-10-01", "Erivaldo");
      $guedes09 = relatoriocon("2021-02-01","2021-10-01", "Osmar Guedes");
      $pedrog09 = relatoriocon("2021-02-01","2021-10-01", "Pedro Gilson");

      $enes209 = porcentagem($enes09);
      $pedrop209 = porcentagem($pedrop09);
      $romao209 = porcentagem($romao09);
      $erivaldo209 = porcentagem($erivaldo09);
      $guedes209 = porcentagem($guedes09);
      $pedrog209 = porcentagem($pedrog09);

      $raimundo09 = relatoriocon("2021-02-01","2021-10-01", "Raimundo");
      $antonio09 = relatoriocon("2021-02-01","2021-10-01", "Antônio");
      $adriano09 = relatoriocon("2021-02-01","2021-10-01", "Adriano");
      $joao09 = relatoriocon("2021-02-01","2021-10-01", "João Victor");
      $marcos09 = relatoriocon("2021-02-01","2021-10-01", "Marcos Antônio");

      $raimundo209 = porcentagem($raimundo09);
      $antonio209 = porcentagem($antonio09);
      $adriano209 = porcentagem($adriano09);
      $joao209 = porcentagem($joao09);
      $marcos209 = porcentagem($marcos90);

      //

      $enes10 = relatoriocon("2021-10-01","2021-11-01", "Enes");
      $pedrop10 = relatoriocon("2021-10-01","2021-11-01", "Pedro Pereira");
      $romao10 = relatoriocon("2021-10-01","2021-11-01", "José Romão");
      $erivaldo10 = relatoriocon("2021-10-01","2021-11-01", "Erivaldo");
      $guedes10 = relatoriocon("2021-10-01","2021-11-01", "Osmar Guedes");
      $pedrog10 = relatoriocon("2021-10-01","2021-11-01", "Pedro Gilson");

      $enes210 = porcentagem($enes10);
      $pedrop210 = porcentagem($pedrop10);
      $romao210 = porcentagem($romao10);
      $erivaldo210 = porcentagem($erivaldo10);
      $guedes210 = porcentagem($guedes10);
      $pedrog210 = porcentagem($pedrog10);

      $raimundo10 = relatoriocon("2021-10-01","2021-11-01", "Raimundo");
      $antonio10 = relatoriocon("2021-10-01","2021-11-01", "Antônio");
      $adriano10 = relatoriocon("2021-10-01","2021-11-01", "Adriano");
      $joao10 = relatoriocon("2021-10-01","2021-11-01", "João Victor");
      $marcos10 = relatoriocon("2021-10-01","2021-11-01", "Marcos Antônio");

      $raimundo210 = porcentagem($raimundo10);
      $antonio210 = porcentagem($antonio10);
      $adriano210 = porcentagem($adriano10);
      $joao210 = porcentagem($joao10);
      $marcos210 = porcentagem($marcos10);

      ?>


    </script>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Eficiência Mecânica/Elétrica</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" id="imprimir" class="btn btn-sm btn-outline-secondary">Imprimir Relatório</button>
          </div>
        </div>
      </div>
      <table class="table table-striped table-sm">
            <tr>
              <th colspan="7" style="background-color: #fff;"><center>MECÂNICA</center></th>
            </tr>
            <tr>
                <th><center>Manutentor:</center></th> 
                 <th><center>Enes</center></th> 
                 <th><center>Pedro Pereira</center></th>
                 <th><center>José Romão</center></th>
                 <th><center>Erivaldo</center></th>
                 <th><center>Osmar Guedes</center></th>
                 <th><center>Pedro Gilson</center></th>
            </tr>

            <tr>
              <th colspan="7" style="background-color: #fff;"><center>FEVEREIRO DE 2021</center></th>
            </tr>

            <tr>
                <th><center>Percentual:</center></th> 
                <th style="background-color: <?php if($enes209 >= 80){ echo '#9ACD32'; }else if($enes209 >= 50 && $enes209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $enes209; ?></center></th>


                <th style="background-color: <?php if($pedrop209 >= 80){ echo '#9ACD32'; }else if($pedrop209 >= 50 && $pedrop209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $pedrop209; ?></center></th>


                <th style="background-color: <?php if($romao209 >= 80){ echo '#9ACD32'; }else if($romao209 >= 50 && $romao209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $romao209; ?></center></th>


                <th style="background-color: <?php if($erivaldo209 >= 80){ echo '#9ACD32'; }else if($erivaldo209 >= 50 && $erivaldo209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $erivaldo209; ?></center></th>


                <th style="background-color: <?php if($guedes209 >= 80){ echo '#9ACD32'; }else if($guedes209 >= 50 && $guedes209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $guedes209; ?></center></th>


                <th style="background-color: <?php if($pedrog209 >= 80){ echo '#9ACD32'; }else if($pedrog209 >= 50 && $pedrog209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $pedrog209; ?></center></th>
            </tr>
            <tr>
                <th><center>H.H.:</center></th> 
                <th><center><?php echo $enes09; ?></center></th>
                <th><center><?php echo $pedrop09; ?></center></th>
                <th><center><?php echo $romao09; ?></center></th>
                <th><center><?php echo $erivaldo09; ?></center></th>
                <th><center><?php echo $guedes09; ?></center></th>
                <th><center><?php echo $pedrog09; ?></center></th>
            </tr>


            <tr>
              <th colspan="7" style="background-color: #fff;"><center>OUTUBRO DE 2021</center></th>
            </tr>

            <tr>
                <th><center>Percentual:</center></th> 
                <th style="background-color: <?php if($enes210 >= 80){ echo '#9ACD32'; }else if($enes210 >= 50 && $enes210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $enes210; ?></center></th>


                <th style="background-color: <?php if($pedrop210 >= 80){ echo '#9ACD32'; }else if($pedrop210 >= 50 && $pedrop210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $pedrop210; ?></center></th>


                <th style="background-color: <?php if($romao210 >= 80){ echo '#9ACD32'; }else if($romao210 >= 50 && $romao210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $romao210; ?></center></th>


                <th style="background-color: <?php if($erivaldo210 >= 80){ echo '#9ACD32'; }else if($erivaldo210 >= 50 && $erivaldo210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $erivaldo210; ?></center></th>


                <th style="background-color: <?php if($guedes210 >= 80){ echo '#9ACD32'; }else if($guedes210 >= 50 && $guedes210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $guedes210; ?></center></th>


                <th style="background-color: <?php if($pedrog210 >= 80){ echo '#9ACD32'; }else if($pedrog210 >= 50 && $pedrog210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $pedrog210; ?></center></th>
            </tr>
            <tr>
                <th><center>H.H.:</center></th> 
                <th><center><?php echo $enes10; ?></center></th>
                <th><center><?php echo $pedrop10; ?></center></th>
                <th><center><?php echo $romao10; ?></center></th>
                <th><center><?php echo $erivaldo10; ?></center></th>
                <th><center><?php echo $guedes10; ?></center></th>
                <th><center><?php echo $pedrog10; ?></center></th>
            </tr>



            <tr>
              <th colspan="7" style="background-color: #fff;"><center><br /><br /><br /></center></th>
            </tr>
            <tr>

            <tr>
              <th colspan="7" style="background-color: #fff;"><center>ELÉTRICA</center></th>
            </tr>
            <tr>
                <th><center>Manutentor:</center></th> 
                 <th><center>Raimundo</center></th> 
                 <th><center>Antônio</center></th>
                 <th><center>Adriano</center></th>
                 <th><center>João Victor</center></th>
                 <th><center>Marcos Antônio</center></th>
                 <th><center>-</center></th>
            </tr>

            <tr>
              <th colspan="7" style="background-color: #fff;"><center>FEVEREIRO DE 2021</center></th>
            </tr>

            <tr>
              <th><center>Percentual:</center></th> 
              <th style="background-color: <?php if($raimundo209 >= 80){ echo '#9ACD32'; }else if($raimundo209 >= 50 && $raimundo209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $raimundo209; ?></center></th>


              <th style="background-color: <?php if($antonio209 >= 80){ echo '#9ACD32'; }else if($antonio209 >= 50 && $antonio209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $antonio209; ?></center></th>


              <th style="background-color: <?php if($adriano209 >= 80){ echo '#9ACD32'; }else if($adriano209 >= 50 && $adriano209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $adriano209; ?></center></th>


              <th style="background-color: <?php if($joao209 >= 80){ echo '#9ACD32'; }else if($joao209 >= 50 && $joao209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $joao209; ?></center></th>


              <th style="background-color: <?php if($marcos209 >= 80){ echo '#9ACD32'; }else if($marcos209 >= 50 && $marcos209 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $marcos209; ?></center></th>


              <th><center>-</center></th>
            </tr>
            <tr>
              <th><center>H.H.:</center></th> 
              <th><center><?php echo $raimundo09; ?></center></th>
              <th><center><?php echo $antonio09; ?></center></th>
              <th><center><?php echo $adriano09; ?></center></th>
              <th><center><?php echo $joao09; ?></center></th>
              <th><center><?php echo $marcos09; ?></center></th>
              <th><center>-</center></th>
            </tr>


            <tr>
              <th colspan="7" style="background-color: #fff;"><center>OUTUBRO DE 2021</center></th>
            </tr>
            
            <tr>
              <th><center>Percentual:</center></th> 
              <th style="background-color: <?php if($raimundo210 >= 80){ echo '#9ACD32'; }else if($raimundo210 >= 50 && $raimundo210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $raimundo210; ?></center></th>


              <th style="background-color: <?php if($antonio210 >= 80){ echo '#9ACD32'; }else if($antonio210 >= 50 && $antonio210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $antonio210; ?></center></th>


              <th style="background-color: <?php if($adriano210 >= 80){ echo '#9ACD32'; }else if($adriano210 >= 50 && $adriano210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $adriano210; ?></center></th>


              <th style="background-color: <?php if($joao210 >= 80){ echo '#9ACD32'; }else if($joao210 >= 50 && $joao210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $joao210; ?></center></th>


              <th style="background-color: <?php if($marcos210 >= 80){ echo '#9ACD32'; }else if($marcos210 >= 50 && $marcos210 <= 79){ echo '#FFA500'; }else{ echo '#FF6347'; } ?>;"><center><?php echo $marcos210; ?></center></th>


              <th><center>-</center></th>
            </tr>
            <tr>
              <th><center>H.H.:</center></th> 
              <th><center><?php echo $raimundo10; ?></center></th>
              <th><center><?php echo $antonio10; ?></center></th>
              <th><center><?php echo $adriano10; ?></center></th>
              <th><center><?php echo $joao10; ?></center></th>
              <th><center><?php echo $marcos10; ?></center></th>
              <th><center>-</center></th>
            </tr>


            <tr>

              <th colspan="7" style="background-color: #fff;">
                <br /><br /><br />
                  <div style="font-size: 15px; font-family: Verdama, Arial;">
                  Legenda:
                  <div style="background-color: #9ACD32; width: 150px; text-align: center;">80% à 100%</div>
                  <div style="background-color: #FFA500; width: 150px; text-align: center;">50% à 79%</div>
                  <div style="background-color: #FF6347; width: 150px; text-align: center;">0% à 49%</div>
                  <br/>
                </div>
              </th>
            </tr>
        
        </table>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>