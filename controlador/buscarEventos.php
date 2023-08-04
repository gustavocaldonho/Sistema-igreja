<?php 

include_once '../../dao/conexao.php';
include_once '../../dao/eventoDAO.php';

function buscarEventos()
{
    $conexao = conectar();

    // Pegando os dados com eventoDAO
    $result = selectEventos($conexao);

    return $result;
}
