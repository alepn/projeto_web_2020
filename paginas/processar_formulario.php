<?php

$sql = "INSERT INTO 
        contato (nome, telefone, email, mensagem) 
        VALUES ('teste','teste','teste','teste')";

if( mysqli_query($link, $sql) === TRUE ){
  echo "Dados inseridos com sucesso!";
}

if(isset($_POST['nome'])){

?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  Formulário enviado com sucesso!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">E-mail</th>
      <th scope="col">Mensagem</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>
            <?= $_POST['nome'] ?>
        </td>
        <td>
            <?= $_POST['telefone'] ?>
        </td>
        <td>
            <?= $_POST['email'] ?>
        </td>
        <td>
            <?= $_POST['mensagem'] ?>
        </td>
    </tr>
  </tbody>
</table>

<?php

}
else{
  
  header("Location: ?pagina=inicio");

}

?>