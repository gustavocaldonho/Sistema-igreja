<?php 

include_once '../../dao/conexao.php';
include_once '../../dao/familiaDAO.php';

function buscarFamilias(){
    $conexao = conectar();

    // Pegando os dados com familiaDAO
    $result = selectFamilias($conexao);

    return $result;
}
