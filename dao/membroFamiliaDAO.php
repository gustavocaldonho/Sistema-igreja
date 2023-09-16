<?php

function cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $id_familia)
{
    $sqlMembro = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb', '$nomeMb', '$dnMb', '$celMb', '$id_familia')";
    mysqli_query($conexao, $sqlMembro) or die(mysqli_error($conexao));
}

function updateMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb)
{
    $sqlUpdate = "UPDATE bd_sistema.membro_familia SET nome='$nomeMb', data_nasc='$dnMb', celular='$celMb' WHERE cpf='$cpfMb'";

    mysqli_query($conexao, $sqlUpdate) or die(mysqli_error($conexao));
}

function deleteMembros($conexao, $id_familia)
{
    $sqlDelete = "DELETE FROM bd_sistema.membro_familia WHERE id_familia = $id_familia";

    mysqli_query($conexao, $sqlDelete) or die(mysqli_error($conexao));
}

function deleteMembroPerfilFamilia($conexao, $cpfMb)
{
    $sqlDelete = "DELETE FROM bd_sistema.membro_familia WHERE cpf = '$cpfMb'";

    mysqli_query($conexao, $sqlDelete) or die(mysqli_error($conexao));
}

function getDadosMembrosFamilia($conexao, $id_familia)
{
    $sqlSelect = "SELECT * FROM bd_sistema.membro_familia WHERE id_familia = $id_familia";

    $resultSelect = $conexao->query($sqlSelect);

    return $resultSelect;
}

function getQtdMembrosFamilia($conexao, $id_familia)
{
    $sqlCount = "SELECT COUNT(*) AS qtd FROM bd_sistema.membro_familia WHERE id_familia = $id_familia";

    $resultCount = $conexao->query($sqlCount);

    return $resultCount;
}

// Verifica se o cpf informado existe na base de dados
function cpfDuplicado($conexao, $cpf)
{
    // Extrai somente os números
    $cpfLimpo = preg_replace('/[^0-9]/is', '', $cpf);

    // $sql = "SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.membro_familia WHERE cpf = '$cpfLimpo'";
    $sql = "SELECT * FROM bd_sistema.membro_familia WHERE cpf = '$cpfLimpo'";
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $lista = mysqli_fetch_assoc($res);

    return $lista;
}

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
