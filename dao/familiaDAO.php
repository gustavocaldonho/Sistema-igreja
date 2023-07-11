<?php 

function cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade)
{
    $sqlFamilia = "INSERT INTO bd_sistema.familia (nome, email, id_comunidade) VALUES ('$nomeFamilia', '$email', '$idComunidade')";
    mysqli_query($conexao, $sqlFamilia) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao);
}
