<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hotelex';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // if($conexao->connect_errno){
    //     echo "errro";
    // }
    // else{
    //     echo "Conexao efetuado com sucesso";
    // }
?>