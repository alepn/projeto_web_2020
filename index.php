<?php

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
      <!-- <div id="menu">

        <ul>
          <li <?= ($pagina == 'inicio')?'class="ativo"':'' ?>><a href="?pagina=inicio">Início</a></li>
          <li <?= ($pagina == 'sobre')?'class="ativo"':'' ?>><a href="?pagina=sobre">Sobre</a></li>
          <li <?= ($pagina == 'contato')?'class="ativo"':'' ?>><a href="?pagina=contato">Contato</a></li>
        </ul>

        

      </div>    -->
      
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
          <li class="breadcrumb-item active" aria-current="page">Início</li>
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  </body>

</html>