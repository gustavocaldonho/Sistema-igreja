<?php

function cadastrarLogin($conexao, $cpfMb)
{
    // ALTERAR A SENHA ##########

    // Inserindo o login do membro
    $sqlLogin = "INSERT INTO bd_sistema.login (membro_familia_cpf, senha, perfil) VALUES ('$cpfMb', '1234', '0')";
    mysqli_query($conexao, $sqlLogin) or die(mysqli_error($conexao));
}

function deleteLogin($conexao, $cpfMb)
{
    $sqlDelete = "DELETE FROM bd_sistema.login WHERE membro_familia_cpf = $cpfMb";

    mysqli_query($conexao, $sqlDelete) or die(mysqli_error($conexao));
}

function getDadosLogin($conexao, $cpf)
{
    $sql = "SELECT * FROM bd_sistema.login WHERE membro_familia_cpf = $cpf";

    $result = mysqli_query($conexao, $sql);

    return $result;
}

function getDadosMembrosFamiliaLogin($conexao, $cpf)
{
    $sqlSelect = "SELECT * FROM bd_sistema.membro_familia WHERE cpf = $cpf";

    $resultSelect = $conexao->query($sqlSelect);

    return $resultSelect;
}
