<?php

function cadastrarAviso($conexao, $titulo, $descricao, $abrangencia, $id_comunidade)
{
    $sqlAviso = "INSERT INTO bd_sistema.avisos (ativo, abrangencia, titulo, descricao, id_comunidade) VALUES (1, $abrangencia, '$titulo', '$descricao', $id_comunidade)";

    mysqli_query($conexao, $sqlAviso) or die(mysqli_error($conexao));
}

function selectAvisos($conexao)
{
    $sql = "SELECT * FROM bd_sistema.avisos
    ORDER BY CASE WHEN ativo = 1 THEN 0 ELSE 1 END, id_avisos DESC";

    $result = $conexao->query($sql);

    return $result;
}

function deleteAviso($conexao, $id_aviso)
{
    $sql = "DELETE FROM bd_sistema.avisos WHERE id_avisos = $id_aviso";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function updateAviso($conexao, $id_aviso, $titulo, $descricao, $abrangencia)
{
    $sqlUpdate = "UPDATE bd_sistema.avisos SET titulo='$titulo', descricao='$descricao', abrangencia='$abrangencia' WHERE id_avisos=$id_aviso";

    $result = $conexao->query($sqlUpdate);
}

function ativarEDesativarAviso($conexao, $id_aviso, $cod)
{
    $sql = "UPDATE bd_sistema.avisos SET ativo = $cod WHERE id_avisos = $id_aviso";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}