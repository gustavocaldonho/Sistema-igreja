<?php

function inserirPagamento($conexao, $id_pagamento, $id_familia, $mes, $status)
{
    // id_pagamento está como auto increment, POR HORA;
    $sql = "INSERT INTO bd_sistema.dizimo (id_familia, mes, status) VALUES ($id_familia, $mes, $status)";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function alterarStatus($conexao, $id_familia, $mes, $status)
{
    $sql = "UPDATE bd_sistema.dizimo SET status = $status WHERE id_familia = $id_familia AND mes = $mes";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function selectPagamento($conexao, $id_familia, $mes)
{
    $sql = "SELECT * FROM  bd_sistema.dizimo WHERE id_familia = $id_familia AND mes = $mes";

    $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return $result;
}
