<?php
session_start();
require "conexao.php";
require "..\modelo\Viagens.php";
require '..\repositorio\ViagemRepositorio.php';


if (isset($_POST['cadastro'])){ 
//if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $nome = $_POST["nomeP"];
    $tipo = $_POST["tipo"];
    $preco = $_POST["preco"];
    $imagem = $_FILES['imagem']['name'];
    
    
    
    $viagem = new Viagem( NULL,
        $tipo,$nome,$preco,$imagem
        );

    $viagemRepositorio = new ViagemRepositorio($conn);
    if (isset($_FILES['imagem']) && ($_FILES['imagem']['error'] == 0)){
        $viagem->setImagem(uniqid() . $_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $viagem->getImagemDiretorio());
    }
    $sucess = $viagemRepositorio->cadastrar($viagem);
    if ($sucess){
        $codcad = rand(0, 1000000);
        echo "<form id='redirectForm' action='../visao/admin.php' method='POST'>";
        echo "<input type='hidden' name='codigo' value={'$codcad'}>";

        echo "<input type='hidden' name='nomeusuario' value=".$_SESSION['nomeusuario'].">";
        echo "<input type='hidden' name='usuario' value=".$_SESSION['usuario'].">";
       
        echo "</form>";
        echo "<script>document.getElementById('redirectForm').submit();</script>";


       // header("Location: ../visao/admin.php?codcad=$codigo");
      //  exit();
    }else{
        echo "erro ao cadastrar produto";
    }
    
}









?>