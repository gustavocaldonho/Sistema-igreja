<?php 
include_once '../../dao/conexao.php';
include_once '../../dao/comunidadeDAO.php';

function buscarComunidades(){
    $conexao = conectar();

    $result = selectComunidades($conexao);

    return $result;
}
