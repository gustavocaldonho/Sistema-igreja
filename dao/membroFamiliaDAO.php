<?php

function carregarComboMembros($conexao, $id_comuidade)
{
    // Variável $sql para criar comando de seleção no banco de dados
    $sql = "SELECT mf.* FROM bd_sistema.membro_familia mf INNER JOIN bd_sistema.familia f ON mf.id_familia = f.id_familia WHERE f.id_comunidade = '$id_comuidade'";

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
