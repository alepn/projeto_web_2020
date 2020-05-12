<?php

    if(isset($_GET["deletar_contato"])){

        $sql = "DELETE FROM contato WHERE id = " . $_GET["deletar_contato"];

        if(mysqli_query($link, $sql) === TRUE){
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Contato deletado com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        }
        else{
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Erro ao deletar contato! Por favor, tente novamente!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        }

    }

    $sql = "SELECT * FROM contato";

    $rows = mysqli_query($link, $sql);

?>

<div class="row">
    <div class="col">
        <h1>Contatos Registrados</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Mensagem</th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    while($row = mysqli_fetch_assoc($rows)){
                ?>

                    <tr>
                        
                        <?php

                            foreach($row as $valor){
                                echo "<td class='align-middle'>$valor</td>";
                            }

                        ?>

                        <td>
                            <a href="?pagina=crud_contato/atualizar_contato&id_contato=<?= $row['id'] ?>" class="btn btn-info">Editar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $row['id'] ?>">Excluir</a>
                        </td>

                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmDeleteModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Deletar contato</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja deletar o contato <b><?= $row['nome'] ?></b>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="?pagina=crud_contato/contatos_registrados&deletar_contato=<?= $row['id'] ?>" class="btn btn-danger">Deletar</a>
                            </div>
                            </div>
                        </div>
                    </div>

                <?php 
                    }
                ?>

            </tbody>
        </table>

    </div>
</div>