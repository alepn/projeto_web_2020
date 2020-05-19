<div class="row justify-content-md-center">
    <div class="col-8">

    <?php

    if(isset($_GET['id_contato']) && isset($_POST['nome'])){

        $objContato = new Contato(
          $_GET['id_contato'],
          $_POST['nome'],
          $_POST['telefone'],
          $_POST['email'],
          $_POST['mensagem']
        );

        if( $objContato->salvar() ){

      ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Contato atualizado com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
        }
        else{
      ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Erro ao atualizar contato! Por favor, tente novamente!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php

        }

      }


    ?>

    <?php 

      if(isset($_GET['id_contato'])){

        $objContato = Contato::get_contato_por_id($_GET['id_contato']);

        if( $objContato ){

    ?>

          <h1>Editar Contato</h1>

          <p>Atualize os dados do formulário de contato abaixo:</p>

          <form action="?pagina=crud_contato/atualizar_contato&id_contato=<?= $objContato->get_id() ?>" method="POST">
              <div class="form-group">
                  <label>Nome:</label>
                  <input type="text" class="form-control" name="nome" required placeholder="Digite seu nome" value="<?= $objContato->get_nome() ?>" />
              </div>
              <div class="form-group">
                  <label>Telefone:</label>
                  <input type="text" class="form-control" name="telefone" required placeholder="Digite seu telefone" value="<?= $objContato->get_telefone() ?>" />
              </div>
              <div class="form-group">
                  <label>E-mail:</label>
                  <input type="email" class="form-control" name="email" required placeholder="Digite seu e-mail" value="<?= $objContato->get_email() ?>" />
              </div>
              <div class="form-group">
                  <label>Mensagem:</label>
                  <textarea name="mensagem" class="form-control" required placeholder="Digite sua mensagem..."><?= $objContato->get_mensagem() ?></textarea>
              </div>
              <div class="form-button">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#confirmUpdateModal">Salvar</a>
                  <a href="?pagina=inicio" class="btn btn-danger">Cancelar</a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="confirmUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Atualizar contato</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Deseja atualizar este contato?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                      </div>
                      </div>
                  </div>
              </div>

          </form>

    <?php
        }
        else{
          echo "
            <center>
              <h2>Contato não encontrado!<h2>
            </center>";
        }
      }
      else{
        
        header("Location: ?pagina=inicio");

      }
    ?>

  </div>
</div>