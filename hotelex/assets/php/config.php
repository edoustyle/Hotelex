<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hotelex_usuarios';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // if($conexao->connect_errno){
    //     echo "errro";
    // }
    // else{
    //     echo "Conexao efetuado com sucesso";
    // }
?>