<?php

  if (isset($_POST['submit'])) {
    // print_r('Nome: ' .$_POST['nome']);
    // print_r('<br>');
    // print_r('Email: ' .$_POST['email']);
    // print_r('<br>');
    // print_r('CPF: ' .$_POST['cpf']);
    // print_r('<br>');
    // print_r('Senha: ' .$_POST['senha']);
    // print_r('<br>');

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(email,cpf,nome_completo,senha)VALUES('$email','$cpf','$nome','$senha')");
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Sign-up</title>
    <script>
        function mascara_cpf(){
            var cpf = document.getElementById('cpf')
            if (cpf.value.length == 3 || cpf.value.length == 7) {
                cpf.value += '.'
            }else if (cpf.value.length == 11) {
                cpf.value += '-'
            }
        }
    </script>
</head>
<body>
  <div class="produto-container">
    <div class="circle">
      <form action="./signup.php" method="POST">
      <div class="sliders">

        <div class="slides">
          <!--botoes-->
          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <input type="radio" name="radio-btn" id="radio4">
          <!--fim botoes-->

          <!--slide imagens-->
          <div class="slide first">
            <img src="../images/nature-3082832_1280.jpg"alt="Imagem 1"/>
          </div>
          <div class="slide">
            <img src="../images/water-839590_1280.jpg"alt="Imagem 2"/>
          </div>
          <div class="slide">
            <img src="../images/polynesia-3021072_1280.jpg"alt="Imagem 3"/>
          </div>
          <div class="slide">
            <img src="../images/road-1072821_1280.jpg"alt="Imagem 4"/>
          </div>
          <!--Fim de slide-->

          <!--Navigacao auto-->
          <div class="navigacao-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
          </div>

        </div>

        <div class= "manual-navigacao">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
        </div>

      </div>
    </div>

    <header>
      <i class="fa-light fa-reply"></i>
    </header>

    <div class="ladex">
      <h2> Hotelex</h2> <br>
      <span>RESERVE SEU REFÚGIO PERFEITO, ONDE CADA ESTADIA SE TORNA UMA EXPERIÊNCIA<BR> INESQUECÍVEL!</span>
        
      <ul> 
        <k2><a href= "./signup.html">Condições de uso</a><br>
        <a href= "./signup.html">Preferências de cookies</a><br>
        <a href="./signup.html">Aviso de Privacidade </a>
      </ul>
      
    </div>
    <div class='container'>
      <div class='card'>
        
          <h1> Cadastre-se </h1>
          
          <div id='msgError'></div>
          <div id="msgSuccess"></div>
          
          <div class='label-float'>
            <input type='email' name="email" id='email' paceholder='' required>
            <label id='labelemail' for='email'>EMAIL</label>
            <input type="tel" name="cpf" autocomplete="off" id="cpf" maxlength="14" paceholder='' required onkeyup="mascara_cpf()">
            <label id='labelcpf' for='cpf'>CPF</label>
            <input type='NomeCompleto' name="nome" id='nome' paceholder='tt' required>
            <label id='labelNome' for='nome'>NOME COMPLETO</label>
          </div>
          <div class='label-float'>
            <input type='password' name="senha" id='senha' paceholder='' required>
            <label id='labelSenha' for='senha'>SENHA</label>
            <i class="fa fa-eye" aria-hidden="true"></i>
            <!--<i class="fa fa-eye" aria-hidden="true"></i>-->
          </div>
          <div class='label-float'>
              <input type='password' id='confirmSenha' paceholder='' required>
              <label id='labelConfirmSenha' for='confirmSenha'>CONFIRME SUA SENHA</label>
            </div>
          <div class='justify-center'>
            <button onclick='entrar()' name='submit'>CADASTRAR</button>
          </div>
          <p>
                Já tem conta?
                <a href="./signin.html">
                  Log-In
                </a>
          </p>
          <br>
          <div class='justify-center'>
          </div>
          <div class='rede-sociais'> 
            <c>OU USE UMA DAS SEGUINTES OPÇÕES</c>
            </div>
            <div class='justify-center'>
            </div>
            <nav class="btn_social">        
              <ul>
                  <li><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#" target="_blank" title="instagram"><i class="fa fa-google"></i></a></li>
                  <li><a href="#" target="_blank" title="apple"><i class="fa fa-apple"></i></a></li>     
              </ul>
          </nav>
      </div>
    </div>
    <script src="../js/signup.js"></script>
  </div>
</body>
</html>