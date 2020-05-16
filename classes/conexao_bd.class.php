<?php

    class ConexaoBD{

        private $link;

        function __construct($host="localhost", $usuario="root", $senha="", $bd="projeto_web_2020_bd"){
            $this->link = mysqli_connect($host, $usuario, $senha, $bd);

            if (!$this->link) {
                echo "Erro: Não foi possível realizar uma conexão com o MySQL." . "<br>";
                echo "Número do erro: " . mysqli_connect_errno() . "<br>";
                echo "Mensagem de erro: " . mysqli_connect_error() . "<br>";
                exit;
            }
        }

        function get_link(){
            return $this->link;
        }

        function __destruct(){
            mysqli_close($this->link);
        }

    }

?>