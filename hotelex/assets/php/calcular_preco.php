<?php
    include("config.php");

    // Adicione uma verificação para garantir que o preço só seja calculado após o envio do formulário
    $precoReserva = null;

    // Função para calcular o preço da reserva
    function calcularPrecoReserva($qtdCamas, $tipoAcomodacao, $tipoCama, $qtdReservas) {
        // Preço base
        $precoBase = 100; // Valor fictício, ajuste conforme necessário

        // Ajustes com base nas escolhas do usuário
        $ajusteCamas = $qtdCamas * 10; // Cada cama adicional acrescenta R$10 ao preço
        $ajusteAcomodacao = ($tipoAcomodacao == 'suíte') ? 50 : 0; // Suítes custam mais R$50
        $ajusteCama = ($tipoCama == 'casal') ? 20 : ($tipoCama == 'beliche' ? 30 : 0); //Cama casal custa mais 20 e béliche mais 30
        $ajusteReservas = ($qtdReservas > 1) ? ($qtdReservas - 1) * 15 : 0; // Cada reserva adicional (além da primeira) acrescenta R$15

        // Calcular o preço total
        $precoTotal = $precoBase + $ajusteCamas + $ajusteAcomodacao + $ajusteCama + $ajusteReservas;

        return $precoTotal;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $qtdCamas = $_POST['qtdcamas'];
        $tipoAcomodacao = $_POST['tipo_acomo'];
        $tipoCama = $_POST['tipo_cama'];
        $qtdReservas = $_POST['qtd_reservas'];

        $precoReserva = calcularPrecoReserva($qtdCamas, $tipoAcomodacao, $tipoCama, $qtdReservas);
    }

    // Fechando a conexão
    $conexao->close();
?>