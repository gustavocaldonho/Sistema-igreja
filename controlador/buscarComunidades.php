<?php
include_once '../../dao/conexao.php';
include_once '../../dao/comunidadeDAO.php';

function buscarComunidades()
{
    $conexao = conectar();

    // Pegando os dados com comunidadeDAO
    $result = selectComunidades($conexao);

    return $result;
}

function buscarDadosComunidade($idComunidade)
{
    $conexao = conectar();

    $result = getDadosComunidade($conexao, $idComunidade);

    $itens = "";

    // Populando o select com os dados do banco
    while ($registro = mysqli_fetch_assoc($result)) {
        $padroeiro = $registro['padroeiro'];
        $localizacao = $registro['localizacao'];

        $itens = $itens . "$padroeiro - $localizacao";
    }

    return $itens;
}
