<?php

require("../../classes/conexao_bd.class.php");
require("../../classes/contato.class.php");

    if(isset($_GET['busca_texto'])){
        if($_GET['busca_por'] == 'id'){
            $vContatos = Contato::get_contato_por_id($_GET['busca_texto']);
        }
        else{
            $vContatos = Contato::get_contatos_por_nome($_GET['busca_texto']);
        }
    }

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