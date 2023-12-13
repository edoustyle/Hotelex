<?php
    include_once('config.php');

    if (isset($_POST['submit'])) {

        print_r('Nome: ' .$_POST['nome']);
        print_r('<br>');
        print_r('Email: ' .$_POST['email']);
        print_r('<br>');
        print_r('CNPJ: ' .$_POST['cnpj']);
        print_r('<br>');
        print_r('Endereço: ' .$_POST['endereco']);
        print_r('<br>');
        print_r('Telefone: ' .$_POST['telefone']);
        print_r('<br>');
        print_r('Site: ' .$_POST['site']);
        print_r('<br>');
        print_r('Descrição Hotel: ' .$_POST['descricao']);
        print_r('<br>');
        print_r('Politicas de Reserva: ' .$_POST['politica_reserva']);
        print_r('<br>');
        print_r('Quantidade de quarto: ' .$_POST['qtdquarto']);
        print_r('<br>');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $site= $_POST['site'];
        $descricao = $_POST['descricao'];
        $politicas = $_POST['politica_reserva'];
        $max_quartos = $_POST['qtdquarto'];
        
        // $result = mysqli_query($conexao, "INSERT INTO hotel(id_hotel,nome_empresa,cnpj,endereco,telefone,email,
        // sitex,descricao,politicas,max_quartos)VALUES(default,'$nome','$cnpj','$endereco','$telefone','$email',
        // '$site','$descricao','$politicas','$max_quartos')");


        // $como_hotel = $_POST['como_hotel'];
        // print_r('Comodidades do Hotel: ' . implode(', ', $como_hotel));
        // print_r('<br>');
        // $como_quarto = $_POST['como_quarto'];
        // print_r('Comodidades de Quarto: ' . implode(', ', $como_quarto));

        // print_r('<br>');
        // if (in_array('Wi-Fi Gratuito', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "INSERT INTO comodidades_hotel (cnpj_hotel, Wi_Fi_Gratuito) VALUES ('$cnpj', 1)");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "INSERT INTO comodidades_hotel (cnpj_hotel, Wi_Fi_Gratuito) VALUES ('$cnpj', 0)");
        // }
        // if (in_array('Estacionamento Privado', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Estacionamento_Privado = 1 WHERE cnpj_hotel = '$cnpj'");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Estacionamento_Privado = 0 WHERE cnpj_hotel = '$cnpj'");
        // }
        // if (in_array('Piscina', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Piscina = 1 WHERE cnpj_hotel = '$cnpj'");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Piscina = 0 WHERE cnpj_hotel = '$cnpj'");
        // }
        // if (in_array('Aceita Pets', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Aceita_Pets = 1 WHERE cnpj_hotel = '$cnpj'");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Aceita_Pets = 0 WHERE cnpj_hotel = '$cnpj'");
        // }
        // if (in_array('Café da manhã', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Café_da_manhã = 1 WHERE cnpj_hotel = '$cnpj'");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Café_da_manhã = 0 WHERE cnpj_hotel = '$cnpj'");
        // }
        // if (in_array('Almoço', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Almoco = 1 WHERE cnpj_hotel = '$cnpj'");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Almoco = 0 WHERE cnpj_hotel = '$cnpj'");
        // }
        // if (in_array('Jantar', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Jantar = 1 WHERE cnpj_hotel = '$cnpj'");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Jantar = 0 WHERE cnpj_hotel = '$cnpj'");
        // }
        // if (in_array('Academia', $como_hotel)) {
        //     print_r('Tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Academia = 1 WHERE cnpj_hotel = '$cnpj'");
        // } else {
        //     print_r('Não tem');
        //     $dale2 = mysqli_query($conexao, "UPDATE comodidades_hotel SET Academia = 0 WHERE cnpj_hotel = '$cnpj'");
        // }

        $nomeImagem = $_FILES['imagem']['name'];
        echo "Caminho da imagem: $nomeImagem";
        $imagem=$_FILES['imagem'];

        $imagemConteudo = file_get_contents($_FILES['imagem']['tmp_name']);
        $imagemBase64 = base64_encode($imagemConteudo);
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     // Se o formulário foi enviado
        //     echo"<br>";
        //     // Informações sobre o arquivo enviado
        //     $nomeImagem = $_FILES['imagem']['name'];
        //     $tipoImagem = $_FILES['imagem']['type'];
        //     $tamanhoImagem = $_FILES['imagem']['size'];
        //     $caminhoTempImagem = $_FILES['imagem']['tmp_name'];
        //     $erroImagem = $_FILES['imagem']['error'];
        
        //     // Exibir as informações
        //     echo "Nome da Imagem: $nomeImagem<br>";
        //     echo "Tipo da Imagem: $tipoImagem<br>";
        //     echo "Tamanho da Imagem: $tamanhoImagem bytes<br>";
        //     echo "Caminho Temporário da Imagem: $caminhoTempImagem<br>";
        //     echo "Erro da Imagem: $erroImagem<br>";
        // }
        // else{
        //     echo "deu ruim";
        // }

        //$img = mysqli_query($conexao, "INSERT INTO imagens_hotel(cnpj_hotel,nome_imagem,caminho)VALUES('$cnpj','$nomeImagem','$imagemBase64')");
        $img2 = mysqli_query($conexao, "UPDATE imagens_hotel SET caminho = '$imagemBase64',nome_imagem ='$nomeImagem' WHERE cnpj_hotel = '12345678901234'");
    }
?>