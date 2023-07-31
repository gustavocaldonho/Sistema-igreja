<?php

function cadastrarComunidade($conexao, $padroeiro, $localizacao, $email)
{
    $sqlComunidade = "INSERT INTO bd_sistema.comunidade (padroeiro, localizacao, email) VALUES ('$padroeiro', '$localizacao', '$email')";
    mysqli_query($conexao, $sqlComunidade) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao); // pega o id da última linha inserida 
}

function cadastrarAviso($conexao, $titulo, $descricao, $status)
{
    // ########################### Trocar o valor id_comunidade ->>> pegar de acordo com o login

    $sqlAviso = "INSERT INTO bd_sistema.avisos (status, titulo, descricao, id_comunidade) VALUES ($status, '$titulo', '$descricao', 10)";

    mysqli_query($conexao, $sqlAviso) or die(mysqli_error($conexao));
}
