<?php

function cadastrarComunidade($conexao, $padroeiro, $localizacao, $email)
{
    $sqlComunidade = "INSERT INTO bd_sistema.comunidade (padroeiro, localizacao, email) VALUES ('$padroeiro', '$localizacao', '$email')";
    mysqli_query($conexao, $sqlComunidade) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao);
}

// Função para pegar o id da comunidade, a fim de realizar o cadastro dos membros do conselho da mesma
function selectIdComunidade($conexao, $cpfChefe)
{
    $sqlIdComunidade = "SELECT idComunidade FROM bd_sistema.comunidade WHERE chefe_conselho_cpf='$cpfChefe'";

    // Executa o comando sql
    $res = mysqli_query($conexao, $sqlIdComunidade) or die(mysqli_error($conexao));

    // Captura os registros da tabela (linhas)
    $registro = mysqli_fetch_assoc($res);

    // Atribui a $idComunidade o que está na célula da coluna 'idComunidade'
    $idComunidade = $registro['idComunidade'];

    return $idComunidade;
}
