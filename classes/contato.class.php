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

        function __get($atributo){
            return $this->$atributo;
        }

        function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        function __toString(){
            return $this->nome . " (" . $this->id . ")";
        }

        function salvar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            if($this->id === NULL){
                $sql = "INSERT INTO 
                    contato (nome, telefone, email, mensagem) 
                    VALUES (:nome,:telefone,:email,:mensagem)";

                if( $stmt = $link->prepare($sql) ){
                    
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    $this->id = $link->lastInsertId();

                    return TRUE;
                }
            }
            else{
                $sql = "UPDATE contato SET 
                        nome=:nome,
                        telefone=:telefone,
                        email=:email,
                        mensagem=:mensagem
                        WHERE id = :id";

                if( $stmt = $link->prepare($sql) ){
                                    
                    $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                    $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $stmt->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

                    $stmt->execute();
                    
                    $stmt->closeCursor();

                    return TRUE;
                }

            }
            
            return FALSE;
        }

        function deletar(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "DELETE FROM contato WHERE id = :id";

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

                $stmt->execute();
                
                $stmt->closeCursor();

                return TRUE;
            }

            return FALSE;
        }

        static function get_contatos(){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT id, nome, telefone, email, mensagem FROM contato";

            $vContatos = array();

            if( $stmt = $link->prepare($sql) ){

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('mensagem', $mensagem);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objContato = new Contato(
                        $id,
                        $nome,
                        $telefone,
                        $email,
                        $mensagem
                    );
    
                    $vContatos[] = $objContato;

                }

                
                $stmt->closeCursor();
            }

            return $vContatos;
        }

        static function get_contato_por_id($id){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT id, nome, telefone, email, mensagem FROM contato WHERE id = :id";

            $vContato = [];

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('mensagem', $mensagem);

                if( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objContato = new Contato(
                            $id,
                            $nome,
                            $telefone,
                            $email,
                            $mensagem
                        );

                    $vContato[] =  $objContato;
    
                }
                
                $stmt->closeCursor();
            }

            return $vContato;
        }

        static function get_contatos_por_nome($nome){
            $objConexao = new ConexaoBD();
            
            $link = $objConexao->get_link();

            $sql = "SELECT id, nome, telefone, email, mensagem FROM contato WHERE nome LIKE :nome";            

            $vContatos = [];

            if( $stmt = $link->prepare($sql) ){
                                    
                $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);

                $stmt->execute();

                $stmt->bindColumn('id', $id);
                $stmt->bindColumn('nome', $nome);
                $stmt->bindColumn('telefone', $telefone);
                $stmt->bindColumn('email', $email);
                $stmt->bindColumn('mensagem', $mensagem);

                while( $stmt->fetch(PDO::FETCH_BOUND) ){

                    $objContato = new Contato(
                            $id,
                            $nome,
                            $telefone,
                            $email,
                            $mensagem
                        );

                    $vContatos[] =  $objContato;
    
                }
                
                $stmt->closeCursor();
            }

            return $vContatos;
        }

    }

?>