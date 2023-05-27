<?php

function cadastrarPadroeiro($conexao, $padroeiro, $localizacao, $cpfChefe)
{
    // Cadastro da Comunidade (o Chefe da comunidade já deve estar cadastrado)
    $sqlComunidade = "INSERT INTO bd_sistema.comunidade (padroeiro, localizacao, chefe_conselho_cpf) VALUES ('$padroeiro', '$localizacao', '$cpfChefe')";
    mysqli_query($conexao, $sqlComunidade) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao);
}
