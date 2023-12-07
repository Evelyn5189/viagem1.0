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
<body>


<body  class="text-center d-flex align-items-center" style="height: 100vh; background-image: url('../assets/images/tucano.jpg'); background-position: 20% 40%;">
  <section style=" margin: auto; width:500px; height:500px display:flex;">
    <form method="post" action="../controladora/processar-cadastro.php" class="form-signin border rounded p-5" style="background-color:white; margin: auto; width:500px; height:500px display:flex; align-items:center; justify-content:center;">
      <h1 class="h3 mb-3 font-weight-normal">Cadastro de Usuários</h1>

      <label for="nome" class="sr-only"></label>
      <input type="text" id="nome" name="nome" placeholder="Digite o seu nome" class="form-control mb-2" required>

      <label for="email" class="sr-only"></label>
      <input type="text" id="email" name="email" placeholder="Digite o seu e-mail" class="form-control mb-2" required>
      
      <label for="senha" class="sr-only"></label>
      <input type="password" id="senha" name="senha" placeholder="Digite uma senha" class="form-control mb-2" required>
      
      <label for="confirmarsenha" class="sr-only"></label>
      <input type="password" id="confirmarsenha" name="confirmarsenha" placeholder="Confirme a sua senha" class="form-control mb-2" required>

      <?php 
            if(isset($_GET["erro"])){
                //echo "erro! senha e confirmar senha não são iguais";
            ?>
                <label for="erro">Senha e confirmar senha não são iguais</label>
            <?php } ?>
            <div style="height: 1vh;">
                <form action="cadastrar-usuario.php" method="post" style=" margin: auto; margin-top:50px; width:400px; height:500px display:flex; align-items:center; justify-content:center;">
                    <input type="submit" name="cadastro" class="btn btn-lg btn-primary btn-block" value="Cadastrar usuário" style="background-color:#00d8ff;" />
                </form>
            </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

