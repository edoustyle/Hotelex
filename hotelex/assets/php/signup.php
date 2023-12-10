<?php

  if (isset($_POST['submit'])) {
    print_r('Nome: ' .$_POST['nome']);
    print_r('<br>');
    print_r('Email: ' .$_POST['email']);
    print_r('<br>');
    print_r('CPF: ' .$_POST['cpf']);
    print_r('<br>');
    print_r('Senha: ' .$_POST['senha']);
    print_r('<br>');

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    //$sql="INSERT INTO usuario(id_cadastro,email,cpf,nome_completo,senha) VALUES (default,$nome,$sobrenome,$email,$senha)";
    $result = mysqli_query($conexao, "INSERT INTO usuario(id_cadastro,email,cpf,nome_completo,senha)VALUES(default,'$email','$cpf','$nome','$senha')");


  }
  
?>