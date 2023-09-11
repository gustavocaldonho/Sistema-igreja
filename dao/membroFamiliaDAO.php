<?php

function carregarComboMembros($conexao, $id_comuidade)
{
    // Variável $sql para criar comando de seleção no banco de dados
    $sql = "SELECT mf.* FROM bd_sistema.membro_familia mf INNER JOIN bd_sistema.familia f ON mf.id_familia = f.id_familia WHERE f.id_comunidade = '$id_comuidade' ORDER BY nome";

    // Executando o comando sql no banco de dados, por meio da $conexao
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    $itens = "";

    // Populando o select com os dados do banco
    while ($registro = mysqli_fetch_assoc($res)) {
        $nome = $registro['nome'];
        $cpf = $registro['cpf'];

        $itens = $itens . "<option value='$cpf'>$nome</option>";
    }

    return $itens;
}

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
