<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $link = mysqli_connect("localhost", "root", "", "projeto_web_2020_bd");

    if (!$link) {
        echo "Erro: Não foi possível realizar uma conexão com o MySQL." . "<br>";
        echo "Número do erro: " . mysqli_connect_errno() . "<br>";
        echo "Mensagem de erro: " . mysqli_connect_error() . "<br>";
        exit;
    }

?>
