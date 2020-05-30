<?php

if(isset($_POST['username'])){

    $objConexao = new ConexaoBD();
                
    $link = $objConexao->get_link();

    $sql = "SELECT id, first_name, last_name FROM usuario WHERE username = :username AND password = :password";

    if( $stmt = $link->prepare($sql) ){
                                        
        $stmt->bindParam(":username", $_POST['username'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $_POST['password'], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->bindColumn('id', $id);
        $stmt->bindColumn('first_name', $first_name);
        $stmt->bindColumn('last_name', $last_name);

        if( $stmt->fetch(PDO::FETCH_BOUND) ){

            $_SESSION['id'] = $id;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;

            header("Location: ?pagina=area_restrita");

        }
        else{
            echo "Usuário/Senha inválidos!";
        }
        
        $stmt->closeCursor();
    }

}

?>

<div class="row justify-content-md-center">

    <div class="col-8">

        <h1>Login</h1>

        <p>Preencha o formulário de login abaixo:</p>

        <form action="" method="POST">
            <div class="form-group">
                <label>Usuário:</label>
                <input type="text" class="form-control" name="username" required placeholder="Digite seu usuário" />
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" class="form-control" name="password" required placeholder="Digite sua senha" />
            </div>
            <div class="form-button">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

    </div>

</div>