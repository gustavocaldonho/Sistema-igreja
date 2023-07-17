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

function buscarDadosComunidade($id_comunidade)
{
    $conexao = conectar();

    // retorna o nome e a localização da referida comunidade (numa string só)
    $dados = getNomeLocComunidade($conexao, $id_comunidade);

    return $dados;
}
