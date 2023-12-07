<?php

function conectar()
{
    $dbHost = '127.0.0.1:3306';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = `bd_sistema`;

    $conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) or die("Erro ao conectar: ");

    // if($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

    return $conexao;
}

//conectar();