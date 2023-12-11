<?php
  session_start();
  //print_r($_REQUEST);

  if (isset($_POST['submit'])&&!empty($_POST['email'])&&!empty($_POST['senha'])) {
    //Acessa
    include('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // print_r('Email: '.$email);
    // print_r('<br>');
    // print_r('Senha: '.$senha);
    $sql="SELECT * FROM usuario WHERE email='$email' and senha = '$senha'";
    $result = $conexao->query($sql);
    // print_r($result);

    $msgError = 'Usuário ou senha incorretos';

    if (mysqli_num_rows($result)> 0) {
      // print_r('Existe');
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      header('Location: sistema.php');
    }
    else{
      //print_r('Não Existe');
      //header('Location: ../html/signin.html');
      unset($_SESSION['email']);
      unset($_SESSION['senha']);

      // Exibir mensagem de erro
      //echo $msgError;
      // Redirecionar para a página de login com a mensagem de erro
      header('Location: ../php/signin.php?error=' . urlencode($msgError));
      exit(); // Certifique-se de sair após o redirecionamento
    }
  }
  // Verifique se há uma mensagem de erro na URL
  if (isset($_GET['error'])) {
    $msgError = $_GET['error'];
    // Exiba a mensagem de erro com o estilo desejado
    echo '<script>document.addEventListener("DOMContentLoaded", function() {';
    echo 'var msgError = document.querySelector("#msgError");';
    echo 'msgError.innerHTML = "' . $msgError . '";';
    echo 'msgError.style.display = "block";';
    echo '});</script>';
  }
  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Outros cabeçalhos HTML -->
</head>
  <body>
      <form action="../php/signin.php" method="post">
        <section>
          <div class="circle">
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
                  <img src="../images/Screenshot_2615.png"alt="Imagem 1"/>
                </div>
                <div class="slide">
                  <img src="../images/Screenshot_2616.png"alt="Imagem 2"/>
                </div>
                <div class="slide">
                  <img src="../images/Screenshot_2617.png"alt="Imagem 3"/>
                </div>
                <div class="slide">
                  <img src="../images/Screenshot_2618.png"alt="Imagem 4"/>
                </div>
                <!--Fim de slide-->

                <!--navegacao auto-->
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
            <a href="./pagina_inicial.html"><h2>Hotelex</h2></a> <br>
            <span>RESERVE SEU REFÚGIO PERFEITO, ONDE CADA ESTADIA SE TORNA UMA EXPERIÊNCIA<BR> INESQUECÍVEL!</span>
            <ul> 
              <k2><a href= "./signup.html">Condições de uso</a><br>
              <a href= "./signup.html">Preferências de cookies</a><br>
              <a href="./signup.html">Aviso de Privacidade </a>
            </ul>
            
          </div>
          <div class='container'>
            <div class='card'>
              <h1> Faça seu login </h1>
              
              <div id='msgError'></div>
              
              <div class='label-float'>
                <input type='email' id='email'name='email' paceholder='' required>
                <label id='emailLabel' for='email'>EMAIL</label>
              </div>
              
              <div class='label-float'>
                <input type='password' id='senha' name='senha' paceholder='' required>
                <label id='senhaLabel' for='senha'>SENHA</label>
                <i class="fa fa-eye" aria-hidden="true"></i>
              </div>
              <div class='justify-center'>
                <!-- <button onclick='entrar()'>LOGIN</button> -->
                <input class="submitex" type="submit" name="submit" value="LOGIN">
              </div>
              <br>
              <p> Esqueceu a senha?
                <a href='https://cdpn.io/thicode/debug/NWdGRgK/bZrQWKdyRyQk'> Sim </a>
              </p>
              <p>
                    Não tem uma conta?
                    <a href="../html/signup.html">
                      Cadastre-se
                    </a>
              </p>
              <br>

              <div class='justify-center'>
              </div>
              <div class='rede-sociais'> 
                <c>
                    OU USE UMA DAS SEGUINTES OPÇÕES
                </c>
                  
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
          <script src="../js/signin.js"></script>
        </section>
      </form>
  </body>
</html>