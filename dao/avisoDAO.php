<?php

function cadastrarAviso($conexao, $titulo, $descricao, $status)
{
    // ########################### Trocar o valor id_comunidade ->>> pegar de acordo com o login

    $sqlAviso = "INSERT INTO bd_sistema.avisos (status, titulo, descricao, id_comunidade) VALUES ($status, '$titulo', '$descricao', 10)";

    mysqli_query($conexao, $sqlAviso) or die(mysqli_error($conexao));
}

function selectAvisos($conexao)
{
    $sql = "SELECT * FROM bd_sistema.avisos";

    $result = $conexao->query($sql);

    return $result;
}
