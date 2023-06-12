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

function dadosComunidade($conexao, $idComunidade)
{
    $sqlSelect = "SELECT * FROM bd_sistema.comunidade WHERE id_comunidade=$idComunidade";

    $result = $conexao->query($sqlSelect);

    return $result;
}

function updateComunidade($conexao, $idComunidade, $padroeiro, $localizacao, $email)
{
    $sqlUpdate = "UPDATE bd_sistema.comunidade SET padroeiro='$padroeiro', localizacao='$localizacao', email='$email' WHERE id_comunidade=$idComunidade";

    $result = $conexao->query($sqlUpdate);
}

function deleteComunidade($conexao, $idComunidade){

    $sqlDelete = "DELETE FROM bd_sistema.comunidade WHERE id_comunidade='$idComunidade'";
    
    $result = $conexao->query($sqlDelete);
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
