<!doctype html>
<?php
/* // Verifica se os dados foram recebidos via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  // Configura as variáveis de sessão, se necessário
  $_SESSION['usuario'] = $_POST['usuario'];
  $_SESSION['nomeusuario'] = $_POST['nomeusuario'];
} else {
  $usuario = $_POST['usuario'];
  header("Location: login.php?erro=$usuario");
  exit;
} */
require "..\controladora\Autenticacao.php";


require_once('../controladora/conexao.php');
require_once('../modelo/Viagens.php');
require_once('../repositorio/ViagemRepositorio.php');

$viagemRepositorio = new ViagemRepositorio($conn);
$viagens = $viagemRepositorio->buscarTodos();


?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="../img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>IFSP - Admin</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <!--<img src="../img/logo-ifsp-removebg.png" class="logo-admin" alt="logo-serenatto"> -->

      <!--<img class= "ornaments" src="../img/ornaments-coffee.png" alt="ornaments">-->
    </section>
    <h2>Lista de Viagens</h2>
    <?php if (isset($_POST['codcad'])) { ?>
      <label for="codigo">Viagem cadastrada com sucesso!</label>
    <?php } ?>
    <section class="container-table">
      <table>
        <thead>
          <tr>
            <th>Local</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($viagens as $viagem) : ?>
            <tr>
              <td><?= $viagem->getNome();  ?></td>
              <td><?= $viagem->getTipo();  ?></td>
              <td>R$ <?= $viagem->getPreco();  ?></td>
              <td>
                <form action="editar-viagem.php" method="POST">
                  <input type="hidden" name="id" value="<?= $viagem->getId(); ?>">
                  <input type="hidden" name="tipo" value="<?= $viagem->getTipo(); ?>">
                  <input type="submit" class="botao-editar" value="Editar">
                </form>

              </td>
              <td>
                <form action="excluir-viagem.php" method="POST">
                  <input type="hidden" name="id" value="<?= $viagem->getId(); ?>">
                  <input type="hidden" name="tipo" value="<?= $viagem->getTipo(); ?>">
                  
                  <input type="submit" class="botao-excluir" value="Excluir">
                </form>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
      <form action="cadastrar-viagem.php" method="POST">
        <input type="hidden" name="nomeusuario" value="<?= $_SESSION['nomeusuario']; ?>">
        <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
        <input type="submit" class="botao-cadastrar" name="cadastrar" value="Cadastrar viagem">
      </form>
      <form action="#" method="post">
        <input type="submit" class="botao-cadastrar" value="Baixar Relatório" />
      </form>
    </section>
  </main>
</body>

</html>