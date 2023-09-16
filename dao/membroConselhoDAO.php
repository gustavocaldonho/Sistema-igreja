<?php

function cadastrarMembroConselho($conexao, $cpf, $cargo)
{
    $sql = "INSERT INTO bd_sistema.membro_conselho (membro_familia_cpf, cargo) VALUES ($cpf, '$cargo')";

    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


function getMembrosConselho($conexao)
{
    $sql = "SELECT * FROM bd_sistema.membro_conselho";

    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return $res;
}

function getNomeMembroConselho($conexao, $cpf, $id_comuidade)
{
    $sql = "SELECT mf.nome AS nome FROM bd_sistema.membro_conselho mc INNER JOIN bd_sistema.membro_familia mf ON mc.membro_familia_cpf = mf.cpf INNER JOIN bd_sistema.familia f ON mf.id_familia = f.id_familia
    WHERE mc.membro_familia_cpf = $cpf AND f.id_comunidade = $id_comuidade";

    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retorna somente um nome a cada chamada da função.
    while ($user_data_nome = mysqli_fetch_assoc($res)) {
        return $user_data_nome["nome"];
    }
}

function deleteMembroConselho($conexao, $cpf)
{
    $sql = "DELETE FROM bd_sistema.membro_conselho WHERE membro_familia_cpf = $cpf";

    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}
