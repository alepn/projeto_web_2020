<div class="row justify-content-md-center">
    <div class="col-8">

    <?php

    if(isset($_GET['id_contato']) && isset($_POST['nome'])){

        $id_contato = $_GET['id_contato'];

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $sql = "UPDATE contato SET 
                nome='$nome',
                telefone='$telefone',
                email='$email',
                mensagem='$mensagem' 
                WHERE id = $id_contato
                ";

        if( mysqli_query($link, $sql) === TRUE ){

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

        $sql = "SELECT * FROM contato WHERE id = " . $_GET['id_contato'];

        $rows = mysqli_query($link, $sql);

        if($row = mysqli_fetch_assoc($rows)){

    ?>

          <h1>Editar Contato</h1>

          <p>Atualize os dados do formulário de contato abaixo:</p>

          <form action="?pagina=crud_contato/atualizar_contato&id_contato=<?= $_GET['id_contato'] ?>" method="POST">
              <div class="form-group">
                  <label>Nome:</label>
                  <input type="text" class="form-control" name="nome" required placeholder="Digite seu nome" value="<?= $row['nome'] ?>" />
              </div>
              <div class="form-group">
                  <label>Telefone:</label>
                  <input type="text" class="form-control" name="telefone" required placeholder="Digite seu telefone" value="<?= $row['telefone'] ?>" />
              </div>
              <div class="form-group">
                  <label>E-mail:</label>
                  <input type="email" class="form-control" name="email" required placeholder="Digite seu e-mail" value="<?= $row['email'] ?>" />
              </div>
              <div class="form-group">
                  <label>Mensagem:</label>
                  <textarea name="mensagem" class="form-control" required placeholder="Digite sua mensagem..."><?= $row['mensagem'] ?></textarea>
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
      }
      else{
        
        header("Location: ?pagina=inicio");

      }
    ?>

  </div>
</div>