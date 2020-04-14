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

    <link href="./css/estilo.css" rel="stylesheet">

  </head>

  <body>

    <!-- Container Principal do Site -->
    <div id="container">

      <!-- Cabeçalho -->
      <div id="header">

        <div id="title">Projeto Web</div>

        <div id="description">Este é um site de exemplo.</div>
        
      </div>

      <!-- Menu -->
      <div id="menu">

        <ul>
          <li <?= ($pagina == 'inicio')?'class="ativo"':'' ?>><a href="?pagina=inicio">Início</a></li>
          <li <?= ($pagina == 'sobre')?'class="ativo"':'' ?>><a href="?pagina=sobre">Sobre</a></li>
          <li <?= ($pagina == 'contato')?'class="ativo"':'' ?>><a href="?pagina=contato">Contato</a></li>
        </ul>

      </div>

      <!-- Área Principal -->
      <div id="main">

        <?php

          include("./paginas/$pagina.php");
        
        ?>

      </div>

      <!-- Rodapé -->
      <div id="footer">

        <p>Todos os direitos reservados.</p>

      </div>

  </div>


  </body>

</html>