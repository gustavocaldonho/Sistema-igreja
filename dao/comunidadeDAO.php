<?php

function cadastrarComunidade($conexao, $padroeiro, $localizacao, $email)
{
    $sqlComunidade = "INSERT INTO bd_sistema.comunidade (padroeiro, localizacao, email) VALUES ('$padroeiro', '$localizacao', '$email')";
    mysqli_query($conexao, $sqlComunidade) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao);
}

// Função para exibir as comunidades no panorama geral
function selectComunidades($conexao)
{
    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM bd_sistema.comunidade WHERE padroeiro LIKE '%$data%' or localizacao LIKE '%$data%' or email LIKE '%$data%'";
    } else {
        $sql = "SELECT * FROM bd_sistema.comunidade ORDER BY padroeiro";
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

        // Se o combo for carregado para a atualização dos dados da família, já terá uma comunidade marcada.
        if ($id_comunidade == $id_comEdicao) {
            $itens = $itens . "<option value='$id_comunidade' selected>$padroeiro - $localizacao</option>";
        } else {
            $itens = $itens . "<option value='$id_comunidade'>$padroeiro - $localizacao</option>";

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

function updateComunidade($conexao, $id_comunidade, $padroeiro, $localizacao, $email)
{
    $sqlUpdate = "UPDATE bd_sistema.comunidade SET padroeiro='$padroeiro', localizacao='$localizacao', email='$email' WHERE id_comunidade=$id_comunidade";

    $result = $conexao->query($sqlUpdate);
}

function deleteComunidade($conexao, $id_comunidade)
{
    $sqlDelete = "DELETE FROM bd_sistema.comunidade WHERE id_comunidade='$id_comunidade'";

    $result = $conexao->query($sqlDelete);
}

// function padroeiroDuplicado($conexao, $padroeiro)
// {
//     $sql = "SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.comunidade WHERE padroeiro = '$padroeiro'";
//     $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
//     $lista = mysqli_fetch_assoc($res);

//     return $lista;
// }

function padroeiroDuplicado($conexao, $padroeiro)
{
    $sql = "SELECT COUNT(*)  AS 'qtd' FROM bd_sistema.comunidade WHERE padroeiro = '$padroeiro'";
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

// // Função para pegar o id da comunidade, a fim de realizar o cadastro dos membros do conselho da mesma
// function selectIdComunidade($conexao, $cpfChefe)
// {
//     $sqlIdComunidade = "SELECT idComunidade FROM bd_sistema.comunidade WHERE chefe_conselho_cpf='$cpfChefe'";

//     // Executa o comando sql
//     $res = mysqli_query($conexao, $sqlIdComunidade) or die(mysqli_error($conexao));

//     // Captura os registros da tabela (linhas)
//     $registro = mysqli_fetch_assoc($res);

//     // Atribui a $idComunidade o que está na célula da coluna 'idComunidade'
//     $idComunidade = $registro['idComunidade'];

//     return $idComunidade;
// }
