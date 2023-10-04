<?php

function cadastrarEvento($conexao, $status, $titulo, $descricao, $data, $horario, $local, $presidente)
{

    $sqlEvento = "INSERT INTO bd_sistema.eventos (status, titulo, descricao, data, horario, local, presidente) VALUES ($status, '$titulo', '$descricao', '$data', '$horario', '$local', '$presidente')";

    mysqli_query($conexao, $sqlEvento) or die(mysqli_error($conexao));
}

function selectEventos($conexao)
{
    $sql = "SELECT * FROM bd_sistema.eventos ORDER BY id_eventos DESC";

    $result = $conexao->query($sql);

    return $result;
}

function deleteEvento($conexao, $id_evento)
{
    $sql = "DELETE FROM bd_sistema.eventos WHERE id_eventos = $id_evento";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function updateEvento($conexao, $id_evento, $status, $titulo, $descricao, $data, $horario, $local, $presidente)
{
    $sqlUpdate = "UPDATE bd_sistema.eventos SET status='$status', titulo='$titulo', descricao='$descricao', data='$data', horario='$horario', local='$local', presidente='$presidente' WHERE id_eventos=$id_evento";

    $result = $conexao->query($sqlUpdate);
}

function ativarEDesativarEvento($conexao, $id_evento, $cod)
{
    $sql = "UPDATE bd_sistema.eventos SET ativo = $cod WHERE id_eventos = $id_evento";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}
