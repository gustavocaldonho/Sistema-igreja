<?php

function cadastrarAviso($conexao, $titulo, $descricao, $status, $id_comunidade)
{
    // ########################### Trocar o valor id_comunidade ->>> pegar de acordo com o login

    $sqlAviso = "INSERT INTO bd_sistema.avisos (status, titulo, descricao, id_comunidade) VALUES ($status, '$titulo', '$descricao', $id_comunidade)";

    mysqli_query($conexao, $sqlAviso) or die(mysqli_error($conexao));
}

function selectAvisos($conexao)
{
    $sql = "SELECT * FROM bd_sistema.avisos ORDER BY id_avisos DESC";

    $result = $conexao->query($sql);

    return $result;
}

function deleteAviso($conexao, $id_aviso)
{
    $sql = "DELETE FROM bd_sistema.avisos WHERE id_avisos = $id_aviso";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function updateAviso($conexao, $id_aviso, $titulo, $descricao, $status)
{
    $sqlUpdate = "UPDATE bd_sistema.avisos SET titulo='$titulo', descricao='$descricao', status='$status' WHERE id_avisos=$id_aviso";

    $result = $conexao->query($sqlUpdate);
}