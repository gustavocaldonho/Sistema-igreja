<?php

function cadastrarComunidade($conexao, $padroeiro, $localizacao, $email)
{
    $sqlComunidade = "INSERT INTO bd_sistema.comunidade (ativo, padroeiro, localizacao, email) VALUES (1, '$padroeiro', '$localizacao', '$email')";
    mysqli_query($conexao, $sqlComunidade) or die(mysqli_error($conexao));

    $id = mysqli_insert_id($conexao);

    return $id;
}

// Função para exibir as comunidades no panorama geral
function selectComunidades($conexao)
{
    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM bd_sistema.comunidade WHERE padroeiro LIKE '%$data%' or localizacao LIKE '%$data%' or email LIKE '%$data%' ORDER BY CASE WHEN ativo = 1 THEN 0 ELSE 1 END, padroeiro ASC, id_comunidade DESC";
    } else {
        $sql = "SELECT * FROM bd_sistema.comunidade ORDER BY CASE WHEN ativo = 1 THEN 0 ELSE 1 END, padroeiro ASC, id_comunidade DESC";
    }

    $result = $conexao->query($sql);

    return $result;
}

function carregarComboComunidades($conexao, $id_comEdicao)
{
    // Variável $sql para criar comando de seleção no banco de dados
    $sql = "SELECT * FROM bd_sistema.comunidade ORDER BY padroeiro";

    // Executando o comando sql no banco de dados, por meio da $conexao
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    $itens = "";

    // Populando o select com os dados do banco
    while ($registro = mysqli_fetch_assoc($res)) {
        $id_comunidade = $registro['id_comunidade'];
        $padroeiro = $registro['padroeiro'];
        $localizacao = $registro['localizacao'];
        $ativo = $registro['ativo'];

        // Só exibirá no combobox as comunidades ativas
        if ($ativo == 1) {
            // Se o combo for carregado para a atualização dos dados da família, já terá uma comunidade marcada.
            if ($id_comunidade == $id_comEdicao) {
                $itens = $itens . "<option value='$id_comunidade' selected>$padroeiro - $localizacao</option>";
            } else {
                $itens = $itens . "<option value='$id_comunidade'>$padroeiro - $localizacao</option>";
            }
        }
    }

    return $itens;
}

function getDadosComunidade($conexao, $id_comunidade)
{
    $sqlSelect = "SELECT * FROM bd_sistema.comunidade WHERE id_comunidade = $id_comunidade";

    $result = $conexao->query($sqlSelect);

    return $result;
}

function getQtdFamiliasComunidade($conexao, $id_comunidade)
{
    $sqlSelect = "SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.familia WHERE id_comunidade = $id_comunidade";

    $result = $conexao->query($sqlSelect);

    return $result;
}

function getQtdMembrosComunidade($conexao, $id_comunidade)
{
    $sqlSelect = "SELECT COUNT(*) AS 'qtd'
    FROM bd_sistema.membro_familia mf
    INNER JOIN bd_sistema.familia f ON mf.id_familia = f.id_familia
    WHERE f.id_comunidade = $id_comunidade";

    $result = $conexao->query($sqlSelect);

    return $result;
}

function updateComunidade($conexao, $id_comunidade, $padroeiro, $localizacao, $email)
{
    $sqlUpdate = "UPDATE bd_sistema.comunidade SET padroeiro='$padroeiro', localizacao='$localizacao', email='$email' WHERE id_comunidade=$id_comunidade";

    $result = $conexao->query($sqlUpdate);
}

function updateFotoComunidade($conexao, $id_comunidade, $foto)
{
    $fotoPronta = prepararImagem($foto);

    $sqlUpdate = "UPDATE bd_sistema.comunidade SET foto='$fotoPronta' WHERE id_comunidade=$id_comunidade";

    $result = $conexao->query($sqlUpdate);
}

function deleteComunidade($conexao, $id_comunidade)
{
    $sqlDelete = "DELETE FROM bd_sistema.comunidade WHERE id_comunidade='$id_comunidade'";

    $result = $conexao->query($sqlDelete);
}

function padroeiroDuplicado($conexao, $padroeiro)
{
    $sql = "SELECT COUNT(*) AS 'qtd' FROM bd_sistema.comunidade WHERE padroeiro = '$padroeiro'";
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    $lista = mysqli_fetch_assoc($res);

    while ($user_data = $lista) {
        $qtd = $user_data["qtd"];
        // 0 = false, 1 = true (padroeiro já existe);
        if ($qtd == 1) {
            return true;
        } else {
            return false;
        }
        break;
    }
}

function existeIdComunidade($conexao, $padroeiro, $id_comunidade)
{
    $sql = "SELECT * FROM bd_sistema.comunidade WHERE padroeiro='$padroeiro'";
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    while ($user_data = mysqli_fetch_assoc($res)) {
        $id_Bd = $user_data["id_comunidade"]; // id que está no bd
        if ($id_Bd == $id_comunidade) {
            // atualiza
            return true;
        } else {
            // não pode atualizar
            return false;
        }
        break;
    }
}

function ativarEDesativarComunidade($conexao, $id_comunidade, $cod)
{
    $sql = "UPDATE bd_sistema.comunidade SET ativo = $cod WHERE id_comunidade = $id_comunidade";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}