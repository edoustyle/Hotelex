<?php
    session_start();
    //print_r($_SESSION);

    if ((!isset($_SESSION["email"]))==true and (!isset($_SESSION['senha']))==true) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: signin.php');
    }
    $logado=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sistema</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../css/pagina_inicial.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../fontawesome/releases/v6.5.1/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php
                    echo "<h10>Bem vindo <u>$logado</u></h10>";
                ?> 
            </a>

        </div>
        <div class="d-flex">
            <i class="fa-light fa-right-from-bracket" style="color: #ffffff; font-size: 25px;"></i>
            <a href="sair.php" class="fa-light fa-right-from-bracket"></a>
        </div>
    </nav>
    <br>
    <!-- <?php
        echo "<h10>Bem vindo $logado</h10>";
    ?> -->

</body>
</html>