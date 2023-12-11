<!-- <?php
    include('config.php');
    // Definindo o CNPJ do hotel
    if (isset($_GET['cnpj'])) {
        // Obtenha o valor do parâmetro cnpj
        $cnpjHotel = $_GET['cnpj'];
    }
    //$cnpjHotel = "90123456789012";

    // Array de comodidades
    $comodidades = array('WIFI_gratuito', 'Estacionamento_privado', 'Piscina', 'Aceita_pets', 'Café_da_manhã', 'Almoco', 'Janta', 'Academia');

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
        // Iterando sobre as linhas de resultado
        // while ($row = $result->fetch_assoc()) {
        //     // Agora, você pode acessar os valores das comodidades usando $row['WIFI_gratuito'], $row['Estacionamento_privado'], etc.
        //     // Faça o que você precisa com esses valores aqui
        //     print_r($row);
        // }
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
?> -->


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../css/ficha_do_hotel.css">
      <link rel="stylesheet" type="text/css" href="../fontawesome/releases/v6.5.1/css/all.css">
      <title>Home</title>
  </head>
    <body>
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
                            //$cnpjHotel = "90123456789012";
                        
                            // Executando a consulta
                            $result = $conexao->query($sql);
                        
                            // Iterar sobre os resultados
                            while ($row = $result->fetch_assoc()) {
                                // Exibir o nome do hotel
                                $nomeHotel = obterNomeHotel($conexao, $cnpjHotel); // Função fictícia, você precisa implementar
                                echo "<h1>$nomeHotel</h1>";
                            }
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
                        // Definindo o CNPJ do hotel (substitua isso com o valor real)
                        //$cnpjHotel = "90123456789012";
                    
                        // Consulta SQL
                        //$sql = "SELECT caminho FROM imagens_hotel WHERE cnpj_hotel = '$cnpjHotel'";
                        
                        // Executando a consulta
                        $result = $conexao->query($sql);
                        
                        // Iterar sobre os resultados
                        while ($row = $result->fetch_assoc()) {
                            // Exibir a imagem do hotel
                            $caminhoImagem = obterCaminhoImagem($conexao, $cnpjHotel); // Função fictícia, você precisa implementar
                            echo "<img src='$caminhoImagem' alt='Imagem 5' class='custom-size'>";
                            //print_r($caminhoImagem);
                        }

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
                            // Definindo o CNPJ do hotel (substitua isso com o valor real)
                            //$cnpjHotel = "90123456789012";

                            // Array de comodidades
                            $comodidades = array('WIFI_gratuito', 'Estacionamento_privado', 'Piscina', 'Aceita_pets', 'Café_da_manhã', 'Almoco', 'Janta', 'Academia');
                        
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
                    
                    <h4-1>
                        <!-- Wi-Fi Gratuito
                        Banheiro Privativo
                        Estacionamento Privado
                        Piscina
                        Aceita Pets
                        Café da Manhã
                        Almoço
                        Janta -->
                    </h4-1>
                    
                    <hr style="color: #333; background-color: #333; height: 2px; border: none;">
                    <h4>Comodidades do Quarto</h4>
                    <?php
                        include('config.php');
                            // Definindo o CNPJ do hotel (substitua isso com o valor real)
                            //$cnpjHotel = "90123456789012";

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
                    <h4-1>Serviço de Quarto
                        <!-- Frigobar
                        Hidromassagem
                        Banheira
                        TV -->
                    </h4-1>
                    <hr style="color: #333; background-color: #333; height: 2px; border: none;">
                    <h4>Avaliação média dos Hóspedes</h4>
                    <h4-1>
                        <div class="nota">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-light fa-star"></i>
                        </div>
                    </h4-1>
                </div>
                <div class='card2'>
                    <div class='texto_right'>
                        <h1-2-1>Métodos de pagamento</h1-2-1><br>
                        <h1-2-2>Suas informações de pagamento estão seguras conosco.</h1-2-2>
                    </div>
                    <br>
                    <div class="texto_right2">
                        <!-- Campo de desenvolvimento web com 3 opções de botões selecionáveis (radio button) e css de classe "campo" -->
                        <div class="radiex">
                            <label>
                                <input type="radio" name="devweb" value="frontend" checked>
                                <i class="fa-regular fa-credit-card" style="color: #fff;"></i >
                                    <!-- <h3> Crédito (em até 5x sem juros) </h3> -->
                                        <!-- <label for="qtdquarto"><h3>Crédito</h3></label> -->
                                        <h3>Crédito</h3>
                                    <div class="opcoes_credito">
                                        <select id="qtdjuros" required>
                                          <option selected disabled value=""> Em até (5x sem juros)</option>
                                          <option>(5x sem juros)</option>
                                          <option>(4x sem juros)</option>
                                          <option>(3x sem juros)</option>
                                          <option>(2x sem juros)</option>
                                          <option>(1x sem juros)</option>
                                        </select>
                                    </div>
                            </label>
                            <label>
                                <input type="radio" name="devweb" value="frontend"checked>
                                <i class="fa-brands fa-pix" style="color: #00B2B0;"></i> <h3>Pix</h3>
                            </label>
                            <label>
                                <input type="radio" name="devweb" value="frontend"checked>
                                <i class="fa-solid fa-barcode" style="color: #ffffff;"></i> <h3>Boleto</h3>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card3">
                    <div class="conteudo">
                        <i class="fa-thin fa-calendar"></i>
                        <label for="txtData">Check in - Entrada</label>
                        <input type="date" id="txtData" name="data">
                    </div>
                </div>

                <div class="card4">
                    <div class="conteudo">
                        <i class="fa-thin fa-calendar"></i>
                        <label for="txtData">Check out - Saída</label>
                        <input type="date" id="txtData" name="data">
                    </div>
                </div>
                <div class="card5">
                    <div class="selecta">
                        <label for="qtdquarto"><strong>NUMERO<br> DE CAMAS</strong></label>
                        <select id="qtdquarto" required>
                          <option selected disabled value="">Selecione</option>
                          <option>4</option>
                          <option>3</option>
                          <option>2</option>
                          <option>1</option>
                        </select>
                    </div>
                    <div class="selecta2">
                        <label for="qtdquarto"><strong>TIPO<br> DE CAMA</strong></label>
                        <select id="qtdquarto" required>
                          <option selected disabled value="">Selecione</option>
                          <option>Casal</option>
                          <option>Solteiro</option>
                          <option>Beliche</option>
                        </select>
                    </div>
                    <div class="selecta3">
                        <label for="qtdquarto"><strong>TIPO <br> DE ACOMODAÇÃO</strong></label>
                        <select id="qtdquarto" required>
                          <option selected disabled value="">Selecione</option>
                          <option>Quarto</option>
                          <option>Suíte</option>
                        </select>
                    </div>
                    <div class="selecta4">
                        <label for="qtdquarto"><strong>QUANTIDADE<br> DE RESERVAS</strong></label>
                        <select id="qtdquarto" required>
                          <option selected disabled value="">Selecione</option>
                          <option>7</option>
                          <option>6</option>
                          <option>5</option>
                          <option>4</option>
                          <option>3</option>
                          <option>2</option>
                          <option>1</option>
                        </select>
                    </div>
                </div>
                <div class='justify-center'>
                    <a href="./pagina_inicial.html">
                        <button>Reservar Agora</button>
                    </a>
                </div>
            </div>
            <script src="../js/pagamentex.js"></script>
        </div>
        </section>
    </body>
</html>