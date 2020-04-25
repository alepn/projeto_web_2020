<?php

if(isset($_POST['nome'])){

?>

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

?>