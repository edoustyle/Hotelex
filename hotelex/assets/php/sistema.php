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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="../fontawesome/releases/v6.5.1/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #eadd93; margin-top:0px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php
                    echo "<h10>Bem vindo <u>$logado</u></h10>";
                ?> 
            </a>

        </div>
    </nav>
    <br>
    <!-- <?php
        echo "<h10>Bem vindo $logado</h10>";
    ?> -->
    <div class='container' style='margin-top: -20px;'>
        <div class="card">
            
        </div>
        <h1>Hotelex</h1>
        <h1-1>Explore, reserve e viva experiências únicas</h1-1>
        <h1-2>Encontre as melhores ofertas em hotéis...</h1-2>
        
        
        <div class="logo">
            <img src="../images/Logo_Hotelex-removebg-preview_1.png"alt="loguex"/>
            <div class="user-cont" style='right:300px;'>
                <h1-4><a href="sair.php" class="fa-light fa-right-from-bracket" ></a></h1-4>
            </div>
            <a href= "../html/anuncia.html"><h1-3>Anuncie sua propriedade</h1-3></a>
        </div>
        
        <div class="card2">
        
        </div>
        <h2>Promoções</h2>
        <h2-1>As melhores opções de ofertas e promoções</h2-1>
        <div class="card3">
            
        </div>
        <div class='justify-center'>
            <button>Localidade</button>
            <button>Data de checkin</button>
            <button>Quartos</button>
            <button>Todas as opções</button>
        </div>
        <div class="topicos">

        </div>
        <div class="quadradex">
            <div class="box">
                <img src="../images/image_10.png" alt="Imagem 1">
                <div class="text"><h3-1>A partir de</h3-1></div>
                <div class="ofertex"><h3>Ofertas especiais</h3></div>
                <div class="preço"><h3-2>R$ 222</h3-2></div>
            </div>
            <div class="box">
                <img src="../images/image_8.png" alt="Imagem 2">
                <div class="text"><h3-1>A partir de</h3-1></div>
                <div class="ofertex"><h3>Ofertas especiais</h3></div>
                <div class="preço"><h3-2>R$ 300</h3-2></div>
            </div>
            <div class="box">
                <img src="../images/image_9.jpg" alt="Imagem 3">
                <div class="text"><h3-1>A partir de</h3-1></div>
                <div class="ofertex"><h3>Ofertas especiais</h3></div>
                <div class="preço"><h3-2>R$ 180</h3-2></div>
            </div>
            <div class="box">
                <img src="../images/image_11.png" alt="Imagem 4">
                <div class="text"><h3-1>A partir de</h3-1></div>
                <div class="ofertex"><h3>Ofertas especiais</h3></div>
                <div class="preço"><h3-2>R$ 400</h3-2></div>
            </div>
            <h4>Escolha seu destino</h4>
            <h4-1>Escolha entre os melhores e especiais destinos</h4-1>
            <div class="box2">
                <img src="../images/Sao_paulo.png" alt="Imagem 5" class="custom-size">
                <div class="text"><h3-3-1>São Paulo</h3-3-1></div>
            </div>
            <div class="box2">
                <img src="../images/Ceara.png" alt="Imagem 6" class="custom-size2">
                <div class="text"><h3-3-2>Ceará</h3-3-2></div>
            </div>
            <div class="box2">
                <img src="../images/Belém.png" alt="Imagem 7" class="custom-size3">
                <div class="text"><h3-3-3>Belém</h3-3-3></div>
            </div>
            <div class="box2">
                <img src="../images/Rio_janeiro.png" alt="Imagem 8" class="custom-size4">
                <div class="text"><h3-3-4>Rio de Janeiro</h3-3-4></div>
            </div>
            <h5>Hospedagem mais procuradas</h5>
            <h5-1>Opções mais procuradas por viajantes no Brasil</h5-1>
            <div class="box3">
                <img src="../images/Hotel_Campinas.png" alt="Imagem 8" class="custom-size4">
                <div class="text"><h5-2-1>5/5</h5-2-1></div>
                <div class="text"><h5-2-2 style='left:240px;'>(92 avaliações)</h5-2-2></div>
                <div class="text"><h5-2-3>Hotel Campinas</h5-2-3></div>
                <div class="text"><h5-2-4>R$ 389</h5-2-4></div>
                <div class="text"><h5-2-5>por diária
                    (inclui impostos e taxas)</h5-2-5></div>
                <div class="ofertex5"><a href='../php/ficha_do_hotel.php?cnpj=12345678901234'><h3>Saiba mais</h3></a></div>
            </div>
            <div class="box3">
                <img src="../images/Hotel_Centro.png" alt="Imagem 8" class="custom-size4">
                <div class="text"><h5-2-1>4/5</h5-2-1></div>
                <div class="text"><h5-2-2 style='left:240px;'>(150 avaliações)</h5-2-2></div>
                <div class="text"><h5-2-3>Hotel Centro</h5-2-3></div>
                <div class="text"><h5-2-4>R$ 1000</h5-2-4></div>
                <div class="text"><h5-2-5>por diária 
                    (inclui impostos e taxas)</h5-2-5></div>
                <div class="ofertex5"><a href='../php/ficha_do_hotel.php?cnpj=56789012345678'><h3>Saiba mais</h3></a></div>
            </div>
            <div class="box3">
                <img src="../images/Hotel_Brasil.png" alt="Imagem 8" class="custom-size4">
                <div class="text"><h5-2-1>3/5</h5-2-1></div>
                <div class="text"><h5-2-2 style='left:240px;'>(90 avaliações)</h5-2-2></div>
                <div class="text"><h5-2-3>Hotel Brasil</h5-2-3></div>
                <div class="text"><h5-2-4>R$ 591</h5-2-4></div>
                <div class="text"><h5-2-5>por diária 
                    (inclui impostos e taxas)</h5-2-5></div>
                <div class="ofertex5"><a href='../php/ficha_do_hotel.php?cnpj=78901234567890'><h3>Saiba mais</h3></a></div>

            </div>
            <div class="box3">
                <img src="../images/Hotel_Collection.png" alt="Imagem 8" class="custom-size4">
                <div class="text"><h5-2-1>4/5</h5-2-1></div>
                <div class="text"><h5-2-2 style='left:240px;'>(182 avaliações)</h5-2-2></div>
                <div class="text"><h5-2-3>Hotel Collection</h5-2-3></div>
                <div class="text"><h5-2-4>R$ 440</h5-2-4></div>
                <div class="text"><h5-2-5>por diária 
                    (inclui impostos e taxas)</h5-2-5></div>
                <div class="ofertex5"><a href='../php/ficha_do_hotel.php?cnpj=90123456789012'><h3>Saiba mais</h3></a></div>
            </div>
        </div>
        <div class="ofertex2"><h3>Ver ofertas</h3></div>
        <div class="ofertex3"><h3>Veja mais</h3></div>
        <div class="ofertex4"><h3>Veja mais</h3></div>
        <h6>Hotelex</h6>
        <div class="logo2">
            <img src="../images/Logo_Hotelex-removebg-preview.png"alt="loguex"/>
        </div>
        <div class="selecta">
            <select id="qtdquarto" required onchange="changeFlag(this.value)">
                <option value="brazil">Português-BR</option>
                <option value="usa">English</option>
                <option value="spain">Español</option>
            </select>
            <img id="brazil"  src="https://img.icons8.com/color/48/brazil.png" alt="brazil" class="bandeirabr" />
            <img id="usa" src="https://img.icons8.com/color/48/usa.png" alt="usa" class="bandeirabr" style="display: none;"/>
            <img id="spain" src="https://img.icons8.com/color/48/spain.png" alt="spain" class="bandeirabr" style="display: none;"/>
        </div>

        <script>
            function changeFlag(value) {
                document.getElementById('brazil').style.display = 'none';
                document.getElementById('usa').style.display = 'none';
                document.getElementById('spain').style.display = 'none';

                if (value) {
                    document.getElementById(value).style.display = 'block';
                }
            }
        </script>
        <ul class="contatos">
            <li>Atendimento</li>
            <li>Quem somos</li>
            <li>App Hotelex</li>
            <li>Afiliados</li>
            <li>Central de ajuda</li>
        </ul>
        <ul class="contatos2">
            <li>Condições de uso</li>
            <li>Informações legais</li>
            <li>Preferências de cookies</li>
            <li>Avisos de privacidade</li>
        </ul>
        <div class="social_media">
            <i class="fa-brands fa-square-x-twitter"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-square-instagram"></i>
        </div>
        <script src="../js/anuncia.js"></script>
    </div>
</body>
</html>