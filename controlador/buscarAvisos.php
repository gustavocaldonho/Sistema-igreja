<?php 

include_once '../../dao/conexao.php';
include_once '../../dao/avisoDAO.php';

function buscarAvisos()
{
    $conexao = conectar();

    // Pegando os dados com avisoDAO
    $result = selectAvisos($conexao);

    return $result;
}
