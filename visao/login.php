<!doctype html>
<html lang="pt-br">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Viagens 10</title>
</head>

<body  class="text-center d-flex align-items-center" style="height: 100vh; background-image: url('../assets/images/aviao2.jpg'); background-position: 10% 40%;">
  <section style=" margin: auto; width:500px; height:500px display:flex; align-items:center; justify-content:center;">
    <form method="post" action="../controladora/processar-login.php" class="form-signin border rounded p-5" style="background-color:white; margin: auto; width:500px; height:500px display:flex; align-items:center; justify-content:center;">
      <h1 class="h3 mb-3 font-weight-normal">Faça o login</h1>

      <label for="email" class="sr-only"></label>
      <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" class="form-control mb-2" required>

      <label for="senha" class="sr-only"></label>
      <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" class="form-control mb-2" required>

      <input type="submit" class="btn btn-lg btn-primary btn-block" style="background-color:#00d8ff;" name="entrar" value="Entrar" />
      <?php if (isset($_GET["erro"])){ ?>
        <label for="senha">Usuário ou senha inválidos</label>
<?php }
?>
    </form>

    <div style="height: 1vh;">
      <form action="cadastrar-usuario.php" method="post" style=" margin: auto; margin-top:50px; width:400px; height:500px display:flex; align-items:center; justify-content:center;">
        <input type="submit" name="cadastro" class="btn btn-lg btn-primary btn-block" value="Usuário novo" style="background-color:#00d8ff;" />
      </form>
      </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>