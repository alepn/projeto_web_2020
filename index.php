<?php

require("config/config.php");
require("classes/conexao_bd.class.php");
require("classes/contato.class.php");

// if(isset($_GET['pagina'])){
//   $pagina = $_GET['pagina'];
// }
// else{
//   $pagina = 'inicio';
// }

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';

$bgColor = (isset($_COOKIE['bgColor'])) ? $_COOKIE['bgColor'] : '#FFF';

if(isset($_POST['bgColor'])){
  setcookie('bgColor', $_POST['bgColor'], time()+3600);
  $bgColor = $_POST['bgColor'];
}


?>

<html>

  <head>
    <title>Projeto Web</title>

    <meta charset="utf-8" />

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- CSS do projeto -->
    <link href="./css/estilo.css" rel="stylesheet">

  </head>

  <body style="background: <?= $bgColor ?>;">

    <!-- Container Principal do Site -->
    <div class="container">

      <!-- Cabeçalho -->
      <div id="header">

        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Projeto Web</h1>
            <p class="lead">Este é um site de exemplo.</p>
          </div>
        </div>
        
      </div>

      <!-- Menu -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav">
            <li class="nav-item <?= ($pagina == 'inicio')?'active':'' ?>">
              <a class="nav-link" href="?pagina=inicio">Início</a>
            </li>
            <li class="nav-item <?= ($pagina == 'sobre')?'active':'' ?>">
              <a class="nav-link" href="?pagina=sobre">Sobre</a>
            </li>
            <li class="nav-item <?= ($pagina == 'contato')?'active':'' ?>">
              <a class="nav-link" href="?pagina=contato">Contato</a>
            </li>
            <li class="nav-item <?= ($pagina == 'area_restrita')?'active':'' ?>">
              <a class="nav-link" href="?pagina=area_restrita">Área restrita</a>
            </li>
          </ul>
        </div>
        <?php
          if(isset($_SESSION['id'])){
        ?>
            <div>
              Bem-vindo <?= $_SESSION['first_name'] ?>
              (<a href="?pagina=logout">Sair</a>)
            </div>
        <?php
          }
        ?>
      </nav>

      <!-- Breadcrumbs -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <?php
            if($pagina == 'inicio'){
              echo '<li class="breadcrumb-item active" aria-current="page">Início</li>';
            }
            else{
              echo '<li class="breadcrumb-item" aria-current="page"><a href="?pagina=inicio">Início</a></li>';            
          
              if($pagina == 'sobre'){
                echo '<li class="breadcrumb-item active" aria-current="page">Sobre</li>';
              }
              else if($pagina == 'contato'){
                echo '<li class="breadcrumb-item active" aria-current="page">Contato</li>';
              }
              else{
                echo '<li class="breadcrumb-item active" aria-current="page">Login</li>';
              }

            }
          ?>
        </ol>
      </nav>

      <div id="escolha-cor-bg">
        <form method="POST">
          <input type="color" name="bgColor" value="<?= $bgColor ?>" />
        </form>
      </div>

      <!-- Área Principal -->
      <div id="main">

        <?php

          include("./paginas/$pagina.php");
        
        ?>

      </div>

      <!-- Rodapé -->
      <div id="footer">

      <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <p>Projeto Web</p>
            <p>Este é um site de exemplo.</p>
          </div>
        </div>

      </div>

  </div>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="./js/jquery-3.4.1.slim.min.js"></script> -->
  
  <!-- Scripts JS do Bootstrap -->
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <!-- Scripts para mascaras de inputs -->
  <script src="./js/jquery.mask.min.js"></script>
  <script src="./js/mask.inputs.js"></script>

  <script>

      $( "#escolha-cor-bg input" ).change(function() {
        document.cookie = "bgColor=" + $(this).val();
        $('body').css('background', $(this).val());
      });

      // $( "#link-menu-sobre" ).click(function() {

      //   $.ajax({
      //     url: "paginas/sobre.php"
      //   })
      //   .done(function( html ) {
      //     $( "#main" ).html( html );
      //   });

      // });

      $( "form" ).submit(function(e) {

          e.preventDefault();

          $.ajax({
            method: "GET",
            url: "paginas/crud_contato/buscar_contatos_ajax.php",
            data: {'busca_por': $('select').val(), 'busca_texto': $('input[type=text]').val()}
          })
          .done(function( html ) {
            $( "tbody" ).html( html );
          });

        });

  </script>

  </body>

</html>