<?php
    // Conecte ao banco de dados, se necessário

    // Obtenha o CNPJ da consulta GET
    $cnpjHotel = $_GET['cnpj'];
    include('config.php');
    // Execute uma consulta para obter a imagem do banco de dados
    $query = "SELECT caminho FROM imagens_hotel WHERE cnpj_hotel = '$cnpjHotel'";
    $resultado = mysqli_query($conexao, $query);

    print_r('teste');
    // Verifique se a consulta foi bem-sucedida
    if ($resultado) {
        // Obtém os dados binários da imagem
        $dadosImagem = mysqli_fetch_assoc($resultado)['imagem'];

        // Define o cabeçalho da resposta como uma imagem
        header("Content-type: image/*");
        print_r("teste entrei no if imagem");
        // Exibe os dados da imagem
        echo base64_decode($dadosImagem);
        
    } else {
        // Em caso de erro, você pode exibir uma imagem padrão ou uma mensagem de erro
        echo "Erro ao carregar a imagem.";
    }

    // Feche a conexão, se necessário
    mysqli_close($conexao);
?>