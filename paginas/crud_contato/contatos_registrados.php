<?php

    if(isset($_GET["deletar_contato"])){

        $objContato = new Contato($_GET["deletar_contato"]);

        if( $objContato->deletar() ){
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

    if(isset($_POST['busca_texto'])){
        if($_POST['busca_por'] == 'id'){
            $vContatos = Contato::get_contato_por_id($_POST['busca_texto']);
        }
        else{
            $vContatos = Contato::get_contatos_por_nome($_POST['busca_texto']);
        }
    }
    else{
        $vContatos = Contato::get_contatos();
    }

?>

<div class="row">
    <div class="col">

        <form action="" method="POST">
            <div class="form-group">
                <label>Buscar por:</label>
                <select class="form-control" name="busca_por">
                    <option value="id">ID</option>
                    <option value="nome">Nome</option>
                </select>
            </div>
            <div class="form-group">
                <label>Texto:</label>
                <input type="text" class="form-control" name="busca_texto" required placeholder="Digite o ID ou o Nome a ser buscado..." />
            </div>
            <div class="form-button">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <h1>Contatos Registrados</h1>

        <?php 

            if(!$vContatos){
                echo "Nenhum contato encontrado!";
            }
            else{

        ?>

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
                    foreach($vContatos as $objContato){
                ?>

                    <tr>

                        <td class='align-middle'>
                            <?= $objContato->id ?>
                        </td>
                        <td class='align-middle'>
                            <?= $objContato->nome ?>
                        </td>
                        <td class='align-middle'>
                            <?= $objContato->telefone ?>
                        </td>
                        <td class='align-middle'>
                            <?= $objContato->email ?>
                        </td>
                        <td class='align-middle'>
                            <?= $objContato->mensagem ?>
                        </td>
                        <td>
                            <a href="?pagina=crud_contato/atualizar_contato&id_contato=<?= $objContato->id ?>" class="btn btn-info">Editar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?= $objContato->id ?>">Excluir</a>
                        </td>

                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmDeleteModal<?= $objContato->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Deletar contato</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja deletar o contato <b><?= $objContato->nome ?></b>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="?pagina=crud_contato/contatos_registrados&deletar_contato=<?= $objContato->id ?>" class="btn btn-danger">Deletar</a>
                            </div>
                            </div>
                        </div>
                    </div>

                <?php 
                    }
                ?>

            </tbody>
        </table>

        <?php 
            }
        ?>

    </div>
</div>