<?php

function cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade)
{
    $sqlFamilia = "INSERT INTO bd_sistema.familia (nome, email, id_comunidade) VALUES ('$nomeFamilia', '$email', '$idComunidade')";
    mysqli_query($conexao, $sqlFamilia) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao);
}

function cadastrarMembros($conexao, $nomeMb1, $nomeMb2, $nomeMb3, $nomeMb4, $nomeMb5, $cpfMb1, $cpfMb2, $cpfMb3, $cpfMb4, $cpfMb5, $dnMb1, $dnMb2, $dnMb3, $dnMb4, $dnMb5, $celMb1, $celMb2, $celMb3, $celMb4, $celMb5)
{
    $sqlMembro1 = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb1', '$nomeMb1', '$dnMb1', '$celMb1', 1)";
    mysqli_query($conexao, $sqlMembro1) or die(mysqli_error($conexao));

    $sqlMembro2 = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb2', '$nomeMb2', '$dnMb2', '$celMb2', 1)";
    mysqli_query($conexao, $sqlMembro2) or die(mysqli_error($conexao));

    $sqlMembro3 = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb3', '$nomeMb3', '$dnMb3', '$celMb3', 1)";
    mysqli_query($conexao, $sqlMembro3) or die(mysqli_error($conexao));

    $sqlMembro4 = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb4', '$nomeMb4', '$dnMb4', '$celMb4', 1)";
    mysqli_query($conexao, $sqlMembro4) or die(mysqli_error($conexao));

    $sqlMembro5 = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb5', '$nomeMb5', '$dnMb5', '$celMb5', 1)";
    mysqli_query($conexao, $sqlMembro5) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao);
}
