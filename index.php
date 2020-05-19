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

  <body>

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
          </ul>
        </div>
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
              else{
                echo '<li class="breadcrumb-item active" aria-current="page">Contato</li>';
              }

            }
          ?>
        </ol>
      </nav>

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


  <!-- Scripts JS do Bootstrap -->
  <script src="./js/jquery-3.4.1.slim.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  
  </body>

</html>