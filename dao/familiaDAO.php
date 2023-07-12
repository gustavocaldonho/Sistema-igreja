<?php

function cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade)
{
    $sqlFamilia = "INSERT INTO bd_sistema.familia (nome, email, id_comunidade) VALUES ('$nomeFamilia', '$email', '$idComunidade')";
    mysqli_query($conexao, $sqlFamilia) or die(mysqli_error($conexao));

    $id = mysqli_insert_id($conexao);

    return $id;
}

function cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $idFamilia)
{
    $sqlMembro1 = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb', '$nomeMb', '$dnMb', '$celMb', '$idFamilia')";
    mysqli_query($conexao, $sqlMembro1) or die(mysqli_error($conexao));
}