<?php

include_once '../dao/conexao.php';
include_once '../dao/comunidadeDAO.php';

$id_comunidade = $_GET['id_comunidade'];

if ($id_comunidade > 0) {

    $conexao = conectar();

    // ComunidadeDAO
    deleteComunidade($conexao, $id_comunidade);

    header("Location: ../visao/comunidades/index.php?msg=Comunidade $id_comunidade excluída!");
} else {
    header("Location: ../visao/comunidades/index.php?msg=Falha na exclusão!");
}
