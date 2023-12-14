<?php
    include('config.php');
    // Definindo o CNPJ do hotel
    if (isset($_GET['cnpj'])) {
        // Obtenha o valor do parâmetro cnpj
        $cnpjHotel = $_GET['cnpj'];
    }

    // Array de comodidades
    $comodidades = array('WIFI_gratuito', 'Estacionamento_privado', 'Piscina', 'Aceita_pets', 'Café_da_manhã', 'Almoco', 'Janta', 'Academia');

    // Convertendo o array de comodidades em uma string para a cláusula SELECT
    $colunas = implode(', ', $comodidades);

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../css/ficha_do_hotel.css">
      <link rel="stylesheet" type="text/css" href="../fontawesome/releases/v6.5.1/css/all.css">
      <title>Home</title>
      <script>
        // Função para atualizar o preço ao vivo
        function atualizarPreco() {
            // Obter valores do formulário
            var qtdCamas = parseInt(document.getElementById('qtdcamas').value);
            var tipoAcomodacao = document.getElementById('tipo_acomo').value;
            var tipoCama = document.getElementById('tipo_cama').value;
            var qtdReservas = parseInt(document.getElementById('qtd_reservas').value);

            // Fazer uma solicitação ao PHP para calcular o preço
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'calcular_preco.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Atualizar o elemento HTML com o preço calculado
                    document.getElementById('precoReserva').innerHTML = 'Preço Total da Reserva: R$ ' + xhr.responseText;
                }
            };

            // Enviar os dados do formulário para o PHP
            xhr.send('qtdcamas=' + qtdCamas + '&tipo_acomo=' + tipoAcomodacao + '&tipo_cama=' + tipoCama + '&qtd_reservas=' + qtdReservas);
        }
    </script>
    </head>
    <body>
        <form action="reserva.php" method="POST">
            <section>
                <header>
                <i class="fa-light fa-reply"></i>
                </header>
                <div class="ladex">
                    <a href="sistema.php"><h2>Hotelex</h2></a><br><br>
                    <span>RESERVE SEU REFÚGIO PERFEITO, ONDE CADA ESTADIA SE TORNA UMA EXPERIÊNCIA INESQUECÍVEL!</span>
                </div>
                <div class='container'>
                <div class='card'>
                    <div class="titulex">
                        <?php
                            include('config.php');
                                // Definindo o CNPJ do hotel (substitua isso com o valor real)
                                
                                // Exibir o nome do hotel
                                $nomeHotel = obterNomeHotel($conexao, $cnpjHotel); // Função fictícia, você precisa implementar
                                echo "<h1 style='margin-left:240px;'>$nomeHotel</h1>";
                                // Função fictícia para obter o nome do hotel
                                function obterNomeHotel($conexao, $cnpjHotel) {
                                    $sql = "SELECT nome_empresa FROM hotel WHERE cnpj = '$cnpjHotel'";
                                    $result = $conexao->query($sql);

                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        return $row['nome_empresa'];
                                    }
                                    // Se não encontrar, pode retornar um valor padrão ou vazio, dependendo do que deseja fazer
                                    return 'Nome do Hotel Não Encontrado';
                                }
                                // Fechando a conexão
                                $conexao->close();
                            ?>
                    </div>
                    <br>
                    <h1-1> Dados para a reserva </h1-1>
                    <div class="box2">
                        <!-- <img src="../images/Hotel_Brasil.png" alt="Imagem 5" class="custom-size"> -->
                        <?php
                            include('config.php');

                                // Exibir a imagem do hotel
                                $caminhoImagem = obterCaminhoImagem($conexao, $cnpjHotel); // Função fictícia, você precisa implementar
                                echo "<img src='$caminhoImagem' alt='Imagem 5' class='custom-size'>";
                                //print_r($caminhoImagem);

                            // Função fictícia para obter o caminho da imagem
                            function obterCaminhoImagem($conexao, $cnpjHotel) {
                                $sql = "SELECT caminho FROM imagens_hotel WHERE cnpj_hotel = '$cnpjHotel'";
                                $result = $conexao->query($sql);
                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    return $row['caminho'];
                                }
                                else {
                                    echo "Nenhuma comodidade encontrada para o CNPJ: $cnpjHotel";
                                }

                                // Se não encontrar, pode retornar um caminho padrão ou vazio, dependendo do que deseja fazer
                                return '';
                            }
                        
                            // Fechando a conexão
                            $conexao->close();
                        ?>
                    </div>
                    
                    <div class="ladex_esquerdex">
                        <hr style="color: #333; background-color: #333; height: 2px; border: none;">
                        <h4>Comodidas Oferecidas:</h4>
                        <?php
                            include('config.php');

                                // Array de comodidades
                                $comodidades = array('Wi_Fi_Gratuito', 'Estacionamento_Privado', 'Piscina', 'Aceita_Pets', 'Café_da_manhã', 'Almoco', 'Jantar', 'Academia');
                            
                                // Convertendo o array de comodidades em uma string para a cláusula SELECT
                                $colunas = implode(', ', $comodidades);
                            
                                // Consulta SQL
                                $sql = "SELECT $colunas FROM comodidades_hotel WHERE cnpj_hotel = '$cnpjHotel'";
                            
                                // Executando a consulta
                                $result = $conexao->query($sql);
                            
                                // Verificando se a consulta foi bem-sucedida
                                if ($result === false) {
                                    die("Erro na consulta: " . $conexao->error);
                                }
                            
                                // Verificando se há pelo menos uma linha de resultado
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        //echo "<h4>Comodidades Disponíveis:</h4>";
                                        echo "<ul>";
                                        // Iterar sobre as comodidades
                                        foreach ($comodidades as $comodidade) {
                                            // Verificar se a comodidade está disponível (valor = '1')
                                            if ($row[$comodidade] == '1') {
                                                echo "<h4-1>$comodidade</h4-1>";
                                            }
                                        }
                                        echo "</ul>";
                                    }
                                } else {
                                    echo "Nenhuma comodidade encontrada para o CNPJ: $cnpjHotel";
                                }
                                // Fechando a conexão
                                $conexao->close();
                            ?>
                        
                        <hr style="color: #333; background-color: #333; height: 2px; border: none;">
                        <h4>Comodidades do Quarto</h4>
                        <?php
                            include('config.php');
                                // Array de comodidades
                                $comodidades = array('Ar_Condicionado', 'Banheiro_privativo', 'Serviço_de_Quarto', 'Frigobar', 'Hidromassagem', 'Banheira');
                            
                                // Convertendo o array de comodidades em uma string para a cláusula SELECT
                                $colunas = implode(', ', $comodidades);
                            
                                // Consulta SQL
                                $sql = "SELECT $colunas FROM comodidades_quarto WHERE cnpj_hotel = '$cnpjHotel'";
                            
                                // Executando a consulta
                                $result = $conexao->query($sql);
                            
                                // Verificando se a consulta foi bem-sucedida
                                if ($result === false) {
                                    die("Erro na consulta: " . $conexao->error);
                                }
                            
                                // Verificando se há pelo menos uma linha de resultado
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        //echo "<h4>Comodidades Disponíveis:</h4>";
                                        echo "<ul>";
                                        // Iterar sobre as comodidades
                                        foreach ($comodidades as $comodidade) {
                                            // Verificar se a comodidade está disponível (valor = '1')
                                            if ($row[$comodidade] == '1') {
                                                echo "<h4-1>$comodidade</h4-1>";
                                            }
                                        }
                                        echo "</ul>";
                                    }
                                } else {
                                    echo "Nenhuma comodidade encontrada para o CNPJ: $cnpjHotel";
                                }
                            
                                // Fechando a conexão
                                $conexao->close();
                            ?>
                        </h4-1>
                        <hr style="color: #333; background-color: #333; height: 2px; border: none;">
                        <h4>Avaliação média dos Hóspedes</h4>.
                        <?php
                            include("config.php");
                            $sql = "SELECT quantidade_avaliacao FROM avaliacao WHERE cnpj_hotel = '$cnpjHotel'";
                            $result = $conexao->query($sql);
                            $sql2 = "SELECT numero_estrela FROM avaliacao WHERE cnpj_hotel = '$cnpjHotel'";
                            $result2 = $conexao->query($sql2);

                            if ($result) {
                                $row = $result->fetch_assoc();
                                $quantidade_avaliacao = $row['quantidade_avaliacao'];
                                echo "<h4-1> ($quantidade_avaliacao) Avaliações </h4-1>";
                                
                            }
                            if ($result2) {
                                $row2 = $result2->fetch_assoc();
                                $quantidade_estrela= $row2['numero_estrela'];
                                // Gerar estrelas com base na quantidade_avaliacao
                                for ($i = 0; $i < $quantidade_estrela; $i++) {
                                    echo "<h4-1 style='display: inline-block;'><i class='fa-solid fa-star'></i></h4-1>";
                                }
                                for ($i=$quantidade_estrela; $i < 5; $i++) { 
                                    echo "<h4-1 style='display: inline-block;'><i class='fa-light fa-star'></i></h4-1>";
                                }
                            }
                            // Fechar a conexão
                            $conexao->close();
                        ?>
                    </div>
                    <div class='card2'>
                        <div class='texto_right'>
                            <h1-2-1>Métodos de pagamento</h1-2-1><br>
                            <h1-2-2>Suas informações de pagamento estão seguras conosco.</h1-2-2>
                        </div>
                        <br>
                        <div class="texto_right2">
                            <!-- Exibir o preço calculado -->
                            <!-- <h3 id="precoReserva"><?php echo isset($precoReserva) ? 'Preço Total da Reserva: R$ ' . number_format($precoReserva, 2, ',', '.') : ''; ?></h3> -->
                            <!-- Campo de desenvolvimento web com 3 opções de botões selecionáveis (radio button) e css de classe "campo" -->
                            <div class="radiex">
                                <label>
                                    <input type="radio" name="tipo_pagamentex" value="Crédito" checked>
                                    <i class="fa-regular fa-credit-card" style="color: #fff;"></i >
                                        <!-- <h3> Crédito (em até 5x sem juros) </h3> -->
                                            <!-- <label for="qtdquarto"><h3>Crédito</h3></label> -->
                                            <h3>Crédito</h3>
                                </label>
                                <label>
                                    <input type="radio" name="tipo_pagamentex" value="Pix"checked>
                                    <i class="fa-brands fa-pix" style="color: #00B2B0;"></i> <h3>Pix</h3>
                                </label>
                                <label>
                                    <input type="radio" name="tipo_pagamentex" value="Boleto"checked>
                                    <i class="fa-solid fa-barcode" style="color: #ffffff;"></i> <h3>Boleto</h3>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card3">
                        <div class="conteudo">
                            <i class="fa-thin fa-calendar"></i>
                            <label for="txtData">Check in - Entrada</label>
                            <input type="date" id="txtData" name="data_entrada">
                        </div>
                    </div>

                    <div class="card4">
                        <div class="conteudo">
                            <i class="fa-thin fa-calendar"></i>
                            <label for="txtData">Check out - Saída</label>
                            <input type="date" id="txtData" name="data_saida">
                        </div>
                    </div>
                    <div class="card5">
                        <div class="preco_reserva" style="margin-top:20vh; font-size:5vh;"></div>
                        <p id="precoReserva" style="font-size:4vh; color:#fff;"></p>
                        <div class="selecta">
                            <label for="qtdquarto"><strong>NUMERO<br> DE CAMAS</strong></label>
                            <select id="qtdCamas" name="qtdcamas" onchange="atualizarPreco()" required>
                            <option selected disabled value="">Selecione</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            </select>
                        </div>
                        <div class="selecta2">
                            <label for="qtdquarto"><strong>TIPO<br> DE CAMA</strong></label>
                            <select id="tipoCama" name="tipo_cama" onchange="atualizarPreco()" required>
                            <option selected disabled value="">Selecione</option>
                            <option value="Casal">Casal</option>
                            <option value="Solteiro">Solteiro</option>
                            <option value="Beliche">Beliche</option>
                            </select>
                        </div>
                        <div class="selecta3">
                            <label for="qtdquarto"><strong>TIPO <br> DE ACOMODAÇÃO</strong></label>
                            <select id="tipoAcomodacao" name="tipo_acomo" onchange="atualizarPreco()" required>
                            <option selected disabled value="">Selecione</option>
                            <option value="Quarto">Quarto</option>
                            <option value="Suíte">Suíte</option>
                            </select>
                        </div>
                        <div class="selecta4">
                            <label for="qtdquarto"><strong>QUANTIDADE<br> DE RESERVAS</strong></label>
                            <select id="qtdReservas" name="qtd_reservas" onchange="atualizarPreco()" required>
                            <option selected disabled value="">Selecione</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            </select>
                        </div>
                    </div>
                    <?php
                        include('config.php');
                        $query = "SELECT preco_base FROM hotel WHERE cnpj = '$cnpjHotel'";
                        $resultado = $conexao->query($query);
                        if ($resultado->num_rows > 0) {
                            $row = $resultado->fetch_assoc();
                            $precoBaseHotel = $row['preco_base'];
                            //echo $precoBaseHotel;
                        } else {
                            echo '0'; // Valor padrão se não encontrar um preço base
                        }
                    ?>
                    <script>
                    // Função para calcular o preço da reserva
                    function atualizarPreco() {
                        // Obtenha os valores selecionados pelo usuário
                        var qtdCamas = parseInt(document.getElementById('qtdCamas').value);
                        var tipoAcomodacao = document.getElementById('tipoAcomodacao').value;
                        var tipoCama = document.getElementById('tipoCama').value;
                        var qtdReservas = parseInt(document.getElementById('qtdReservas').value);
                        

                        // Simule o preço base do hotel (substitua isso com a lógica real)
                        var precoBaseHotel = <?php echo $precoBaseHotel; ?>;

                        // Ajustes com base nas escolhas do usuário
                        var ajusteCamas = qtdCamas * 10;
                        var ajusteAcomodacao = (tipoAcomodacao === 'Suíte') ? 50 : 0;
                        var ajusteCama = (tipoCama === 'Casal') ? 20 : ((tipoCama === 'Beliche') ? 30 : 0);
                        var ajusteReservas = (qtdReservas > 1) ? (qtdReservas - 1) * 15 : 0;

                        // Calcular o preço total
                        var precoTotal = precoBaseHotel + ajusteCamas + ajusteAcomodacao + ajusteCama + ajusteReservas;

                        // Atualizar o elemento HTML com o preço calculado
                        document.getElementById('precoReserva').innerHTML = 'Preço: R$' + precoTotal.toFixed(2);
                    }
                    </script>

                    <div class='justify-center'>
                        <?php
                            echo "<input type='hidden' name='cnpj' value='$cnpjHotel'>";
                        ?>
                        <input class="submitex" type="submit" name="submit" value="Reservar Agora">
                    </div>
                </div>
                <script src="../js/pagamentex.js"></script>
            </div>
            </section>
        </form>
    </body>
</html>