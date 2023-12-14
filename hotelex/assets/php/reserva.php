<?php

    include("config.php");
    include("sistema.php");
    if (isset($_POST['submit'])) {

        // print_r('Data entrada: ' .$_POST['data_entrada']);
        // print_r('<br>');
        // print_r('Data saída: ' .$_POST['data_saida']);
        // print_r('<br>');
        // print_r('Quantidade de camas: ' .$_POST['qtdcamas']);
        // print_r('<br>');
        // print_r('Tipo de cama: ' .$_POST['tipo_cama']);
        // print_r('<br>');
        // print_r('Tipo de acomodo: ' .$_POST['tipo_acomo']);
        // print_r('<br>');
        // print_r('Quantidade de reservas: ' .$_POST['qtd_reservas']);
        // print_r('<br>');
        // print_r('Tipo de pagamento: ' .$_POST['tipo_pagamentex']);
        // print_r('<br>');
        // print_r('CNPJ: ' .$_POST['cnpj']);
        // print_r('<br>');
        // print_r('Preço reserva: ' .$_POST['precoReserva']);
        // print_r('<br>');
        // print_r($logado);

        $cnpjHotel = $_POST['cnpj'];
        $data_entra = $_POST['data_entrada'];
        $data_saida = $_POST['data_saida'];
        $qtdcamas = $_POST['qtdcamas'];
        $tipo_cama = $_POST['tipo_cama'];
        $tipo_acomo = $_POST['tipo_acomo'];
        $qtd_reservas = $_POST['qtd_reservas'];
        $tipex_pagamento = $_POST['tipo_pagamentex'];
        //$preco_reserva = $_POST['novoPreco'];
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cnpj'])) {
    //     $cnpjHotelReserva = $_POST['cnpj'];
    //     echo "CNPJ do Hotel para Reserva: $cnpjHotelReserva";
    // } else {
    //     echo "CNPJ não encontrado no formulário.";
    // }

    
    // Suponha que você tenha o email do usuário
     $emailUsuario = $logado;

    // // Consultar o CPF associado ao email na tabela usuario
    $sqlConsulta = "SELECT cpf FROM usuario WHERE email = '$emailUsuario'";

    $resultado = $conexao->query($sqlConsulta);

    if ($resultado->num_rows > 0) {
        // Se houver resultados, obter o CPF
        $linha = $resultado->fetch_assoc();
        $cpfUsuario = $linha['cpf'];
        print_r('<br>');
        echo "O CPF associado ao email $emailUsuario é: $cpfUsuario";
    } else {
        echo "Nenhum resultado encontrado para o email $emailUsuario";
    }

    // Verificar se já existe uma reserva com o CPF na tabela reserva
    $sqlVerificaReserva = "SELECT * FROM reserva WHERE cpf_usuario = '$cpfUsuario'";
    $resultadoVerifica = $conexao->query($sqlVerificaReserva);

    if ($resultadoVerifica->num_rows > 0) {
        // Se já existe uma reserva, realizar a atualização
        $sqlReserva = "UPDATE reserva SET
        cnpj_hotel = '$cnpjHotel',
        checkin_reserva = '$data_entra',
        checkout_reserva = '$data_saida',
        Numero_cama = '$qtdcamas',
        tipo_cama = '$tipo_cama',
        tipo_acomodacao = '$tipo_acomo',
        quantidade_reserva = '$qtd_reservas',
        metodos_pagamento = '$tipex_pagamento'
        WHERE cpf_usuario = '$cpfUsuario'";

        $resultado = $conexao->query($sqlReserva);
        print_r('<br>');
        if ($resultado) {
            echo "Reserva atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a reserva: " . $conexao->error;
        }
    } else {
        // Se não existe uma reserva, realizar a inserção
        $sqlInserirReserva = "INSERT INTO reserva (cpf_usuario, cnpj_hotel, checkin_reserva, checkout_reserva, Numero_cama, tipo_cama, tipo_acomodacao, quantidade_reserva, metodos_pagamento)
        VALUES ('$cpfUsuario', '$cnpjHotel', '$data_entra', '$data_saida', '$qtdcamas', '$tipo_cama', '$tipo_acomo', '$qtd_reservas', '$tipex_pagamento')";

        $resultadoInserir = $conexao->query($sqlInserirReserva);
        print_r('<br>');
        if ($resultadoInserir) {
            echo "Reserva inserida com sucesso!";
        } else {
            echo "Erro ao inserir a reserva: " . $conexao->error;
        }
    }


?>