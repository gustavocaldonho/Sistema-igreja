<?php

// Função para exibir as famílias no panorama geral
function selectFamilias($conexao)
{
    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM bd_sistema.familia WHERE nome LIKE '%$data%'";
    } else {
        $sql = "SELECT * FROM bd_sistema.familia ORDER BY nome";
    }

    $result = $conexao->query($sql);

    return $result;
}

function cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade)
{
    $sqlFamilia = "INSERT INTO bd_sistema.familia (nome, email, id_comunidade) VALUES ('$nomeFamilia', '$email', '$idComunidade')";
    mysqli_query($conexao, $sqlFamilia) or die(mysqli_error($conexao));

    $id = mysqli_insert_id($conexao);

    return $id;
}

function updateFamilia($conexao, $id_familia, $nomeFamilia, $email, $id_comunidade)
{
    $sqlUpdate = "UPDATE bd_sistema.familia SET nome='$nomeFamilia', email='$email', id_comunidade='$id_comunidade' WHERE id_familia='$id_familia'";

    mysqli_query($conexao, $sqlUpdate) or die(mysqli_error($conexao));
}


function cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $id_familia)
{
    $sqlMembro1 = "INSERT INTO bd_sistema.membro_familia (cpf, nome, data_nasc, celular, id_familia) VALUES ( '$cpfMb', '$nomeMb', '$dnMb', '$celMb', '$id_familia')";
    mysqli_query($conexao, $sqlMembro1) or die(mysqli_error($conexao));
}

function deleteMembros($conexao, $id_familia)
{
    $sqlDelete = "DELETE FROM bd_sistema.membro_familia WHERE id_familia = $id_familia";

    mysqli_query($conexao, $sqlDelete) or die(mysqli_error($conexao));
}

function deleteFamilia($conexao, $id_familia)
{
    // Excluindo os membros da família
    $sqlDeleteMembros = "DELETE FROM bd_sistema.membro_familia WHERE id_familia = '$id_familia'";
    $resMembros = mysqli_query($conexao, $sqlDeleteMembros) or die(mysqli_error($conexao));

    // Excluindo a família
    $sqlDeleteFamilia = "DELETE FROM bd_sistema.familia WHERE id_familia = '$id_familia'";
    $resFamilia = mysqli_query($conexao, $sqlDeleteFamilia) or die(mysqli_error($conexao));
}

function getDadosFamilia($conexao, $id_familia)
{
    $sqlSelect = "SELECT * FROM bd_sistema.familia WHERE id_familia = $id_familia";

    $result = $conexao->query($sqlSelect);

    return $result;
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

    $sql = "SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.membro_familia WHERE cpf = '$cpfLimpo'";
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $lista = mysqli_fetch_assoc($res);

    return $lista;
}
