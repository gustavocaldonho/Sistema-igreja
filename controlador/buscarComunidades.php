<?php 
include_once '../../dao/conexao.php';
include_once '../../dao/comunidadeDAO.php';

function buscarComunidades(){
    $conexao = conectar();

    // Pegando os dados com comunidadeDAO
    $result = selectComunidades($conexao);

    return $result;
}
