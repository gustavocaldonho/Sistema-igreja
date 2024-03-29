<?php

// Função para exibir as famílias no panorama geral
function selectFamilias($conexao)
{
    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM bd_sistema.familia WHERE nome LIKE '%$data%' ORDER BY CASE WHEN ativo = 1 THEN 0 ELSE 1 END, nome ASC, id_familia DESC";
    } else {
        $sql = "SELECT * FROM bd_sistema.familia ORDER BY CASE WHEN ativo = 1 THEN 0 ELSE 1 END, nome ASC, id_familia DESC";
    }

    $result = $conexao->query($sql);

    return $result;
}

function cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade)
{
    $sqlFamilia = "INSERT INTO bd_sistema.familia (ativo, nome, email, id_comunidade) VALUES (1, '$nomeFamilia', '$email', '$idComunidade')";
    mysqli_query($conexao, $sqlFamilia) or die(mysqli_error($conexao));

    $id = mysqli_insert_id($conexao);

    return $id;
}

function updateFamilia($conexao, $id_familia, $nomeFamilia, $email, $id_comunidade)
{
    $sqlUpdate = "UPDATE bd_sistema.familia SET nome='$nomeFamilia', email='$email', id_comunidade='$id_comunidade' WHERE id_familia='$id_familia'";

    mysqli_query($conexao, $sqlUpdate) or die(mysqli_error($conexao));
}

function updateFotoFamilia($conexao, $id_familia, $foto)
{
    $fotoPronta = prepararImagem($foto);

    $sqlUpdate = "UPDATE bd_sistema.familia SET foto='$fotoPronta' WHERE id_familia=$id_familia";

    $result = $conexao->query($sqlUpdate);
}

function deleteFamilia($conexao, $id_familia)
{
    $sqlDeleteFamilia = "DELETE FROM bd_sistema.familia WHERE id_familia = '$id_familia'";
    mysqli_query($conexao, $sqlDeleteFamilia) or die(mysqli_error($conexao));
}

function familiaDuplicada($conexao, $nomeFamilia)
{
    $sql = "SELECT COUNT(*) AS 'qtd' FROM bd_sistema.familia WHERE nome = '$nomeFamilia'";
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $lista = mysqli_fetch_assoc($res);

    while ($user_data = $lista) {
        $qtd = $user_data["qtd"];
        // 0 = false, 1 = true (nome já existe);
        if ($qtd == 1) {
            return true;
        } else {
            return false;
        }
        break;
    }
}

function existeIdFamilia($conexao, $nomeFamilia, $id_familia)
{
    $sql = "SELECT * FROM bd_sistema.familia WHERE nome='$nomeFamilia'";
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    while ($user_data = mysqli_fetch_assoc($res)) {
        $id_Bd = $user_data["id_familia"]; // id que está no bd
        if ($id_Bd == $id_familia) {
            // atualiza
            return true;
        } else {
            // não pode atualizar
            return false;
        }
        break;
    }
}

function getDadosFamilia($conexao, $id_familia)
{
    $sqlSelect = "SELECT * FROM bd_sistema.familia WHERE id_familia = $id_familia";

    $result = $conexao->query($sqlSelect);

    return $result;
}

function ativarEDesativarFamilia($conexao, $id_familia, $cod)
{
    $sql = "UPDATE bd_sistema.familia SET ativo = $cod WHERE id_familia = $id_familia";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}
