<?php

    class ConexaoBD{

        private $link;

        function __construct($host="localhost", $usuario="root", $senha="", $bd="projeto_web_2020_bd"){
            $dsn = "mysql:dbname=$bd;host=$host";
            
            try{
                $this->link = new PDO($dsn, $usuario, $senha);
            }
            catch(PDOException $e){
                echo "Erro: Não foi possível realizar uma conexão com o MySQL." . "<br>";
                echo "Mensagem de erro: " . $e->getMessage() . "<br>";
                exit;
            }
        }

        function get_link(){
            return $this->link;
        }

        function __destruct(){
            unset($this->link);
        }

    }

?>