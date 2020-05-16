<?php

    class Contato{

        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $mensagem;

        function __construct($id=NULL, $nome="", $telefone="", $email="", $mensagem=""){
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->mensagem = $mensagem;
        }

        function get_id(){
            return $this->id;
        }

        function get_nome(){
            return $this->nome;
        }

        function set_nome(){
            return $this->nome;
        }

        function salvar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            if($this->id === NULL){
                $sql = "INSERT INTO 
                    contato (nome, telefone, email, mensagem) 
                    VALUES (
                        '$this->nome',
                        '$this->telefone',
                        '$this->email',
                        '$this->mensagem'
                        )";

                if( mysqli_query($link, $sql) === TRUE ){
                    $this->id = mysqli_insert_id($link);
                    return TRUE;
                }
            }
            else{
                $sql = "UPDATE contato SET 
                        nome='$this->nome',
                        telefone='$this->telefone',
                        email='$this->email',
                        mensagem='$this->mensagem' 
                        WHERE id = $this->id";

                return mysqli_query($link, $sql);
            }
            
            return FALSE;
        }

        function deletar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "DELETE FROM contato WHERE id = " . $this->id;

            return mysqli_query($link, $sql);
        }

    }

?>