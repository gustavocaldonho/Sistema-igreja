<?php

include_once '../dao/conexao.php';
include_once '../dao/eventoDAO.php';

$id_evento = $_GET['id'];

if ($id_evento > 0) {

    $conexao = conectar();

    // eventoDAO
    deleteEvento($conexao, $id_evento);

    header("Location: ../visao/homepage/index.php?msg=Evento $id_evento excluído!");
} else {
    header("Location: ../visao/homepage/index.php?msg=Falha na exclusão!");
}