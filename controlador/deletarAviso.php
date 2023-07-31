<?php

include_once '../dao/conexao.php';
include_once '../dao/avisoDAO.php';

$id_aviso = $_GET['id'];

if ($id_aviso > 0) {

    $conexao = conectar();

    // avisoDAO
    deleteAviso($conexao, $id_aviso);

    header("Location: ../visao/homepage/index.php?msg=Aviso $id_aviso excluído!");
} else {
    header("Location: ../visao/homepage/index.php?msg=Falha na exclusão!");
}