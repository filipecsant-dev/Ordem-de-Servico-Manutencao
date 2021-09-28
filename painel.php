<?php
ob_start(); session_start();
require 'funcoes/banco/conexao.php';
require 'funcoes/login/login.php';
logado();

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header("Location: index.php");
}

  

date_default_timezone_set('America/Sao_Paulo');


$fun = $_SESSION['logado'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <script src="js/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="css/stylepainel.css">
    <script src="js/popper.js"></script>
    <script type="text/javascript" src="js/main2.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="S.O.S - By: Filipe Castro">
    <meta name="author" content="Filipe Castro | filipecsant@gmail.com | (071) 98340-9647">
    <meta name="generator" content="S.O.S By Filipe Castro">
     <!-- Favicons -->
  <link rel="apple-touch-icon" href="img/icone2.nestweb.png" sizes="180x180">
  <link rel="icon" href="img/icone.nestweb.png" sizes="32x32" type="image/png">
  <link rel="icon" href="img/icone3.nestweb.png" sizes="16x16" type="image/png">
    <title>S.O.S - By: Filipe Castro</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="css/painel.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/pain.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"  >
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="painel.php"><center><div class="norpack"></center></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div style="color:#fff;" id="admin">S.O.S | Desenvolvido por: Filipe Castro</div>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="?logout=true">Sair<span data-feather="log-out" style="margin-left: 5px;"></span></a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == solicitarservico){echo 'active';} ?>" href="?p=solicitarservico">
              <span data-feather="edit"></span>
              Solicitar Serviço 
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == todosservicos){echo 'active';} ?>" href="?p=todosservicos">
              <span data-feather="file"></span>
              Todos Serviços
            </a>
          </li>
          <?php if($fun->cargo != 1){
            ?>
          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == confirmarservico){echo 'active';} ?>" href="?p=confirmarservico">
              <span data-feather="menu"></span>
              Confirmar Serviço
            </a>
          </li>
          <?php
          }
          if($fun->cargo == 2 || $fun->cargo == 3){
          ?>
          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == servicospendentes){echo 'active';} ?>" href="?p=servicospendentes">
              <span data-feather="edit-3"></span>
              Serviços Pendentes
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == aguardparada){echo 'active';} ?>" href="?p=aguardparada">
              <span data-feather="edit-3"></span>
              Serviços Aguardando Parada de Maquina
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == histequipamento){echo 'active';} ?>" href="?p=histequipamento">
              <span data-feather="file-text"></span>
              Histórico Equipamentos
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == agendarpreventiva){echo 'active';} ?>" href="?p=agendarpreventiva">
              <span data-feather="edit"></span>
              Agendar Preventiva
            </a>
          </li>
          <?php
        }
        if($fun->cargo != 1){

          ?>
       
          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == horasparadas){echo 'active';} ?>" href="?p=horasparadas">
              <span data-feather="bar-chart"></span>
              Horas Paradas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == eficienciamecele){echo 'active';} ?>" href="?p=eficienciamecele">
              <span data-feather="bar-chart-2"></span>
              Eficiência Mec/Ele
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($_GET['p'] == usuarios){echo 'active';} ?>" href="?p=usuarios">
              <span data-feather="users"></span>
              Usuários
            </a>
          </li>
        <?php } ?>
          <li class="nav-item" id="adminn" style="display:none;">
            <a class="nav-link <?php if($_GET['p'] == admin){echo 'active';} ?>" href="?p=admin">
              <span data-feather="pocket"></span>
              Administrador 1
            </a>
          </li>
          <li class="nav-item" id="adminn2" style="display:none;">
            <a class="nav-link <?php if($_GET['p'] == editarserv){echo 'active';} ?>" href="?p=editarserv">
              <span data-feather="pocket"></span>
              Administrador 2
            </a>
          </li>
        </ul>
      </div>
    </nav>
<!----------------------------- CORPO--------------------------------->


<?php
    $pagina = @$_GET['p'];

    if($pagina == 'solicitarservico'){
        require 'paginas/solicitarservico.php';
    } else if($pagina == 'confirmarservico'){
        require 'paginas/confirmarservico.php';
    } else if($pagina == 'servicospendentes'){
        require 'paginas/servicospendentes.php';
    } else if($pagina == 'histequipamento'){
        require 'paginas/histequipamento.php';
    } else if($pagina == 'horasparadas'){
        require 'paginas/horasparadas.php';
    } else if($pagina == 'horasparadasgrafext'){
        require 'paginas/horasparadasgrafext.php';
    } else if($pagina == 'horasparadasgrafimp'){
        require 'paginas/horasparadasgrafimp.php';
    } else if($pagina == 'horasparadasgrafreb'){
        require 'paginas/horasparadasgrafreb.php';
    } else if($pagina == 'horasparadasgrafcs'){
        require 'paginas/horasparadasgrafcs.php';
    } else if($pagina == 'horasparadasgrafmist'){
        require 'paginas/horasparadasgrafmist.php';
    } else if($pagina == 'usuarios'){
        require 'paginas/usuarios.php';
    } else if($pagina == 'eficienciamecele'){
        require 'paginas/eficienciamecele.php';
    } else if($pagina == 'admin'){
        require 'paginas/admin.php';
    } else if($pagina == 'agendarpreventiva'){
        require 'paginas/agendarpreventiva.php';
    } else if($pagina == 'todosservicos'){
        require 'paginas/todosservicos.php';
    } else if($pagina == 'editarserv'){
        require 'paginas/editarserv.php';
    } else if($pagina == 'aguardparada'){
        require 'paginas/aguardparada.php';
    } else{
      require 'paginas/inicio.php';
    }

?>

<!----------------------------- CORPO--------------------------------->
  </div>
</div>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="js/bootstrap.js"></script>
      </body>
</html>
<?php ob_end_flush(); ?>