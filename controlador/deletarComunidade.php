<?php

include_once '../dao/conexao.php';
include_once '../dao/comunidadeDAO.php';

$idComunidade = $_GET['id'];

if ($idComunidade > 0) {

    $conexao = conectar();

    // ComunidadeDAO
    deleteComunidade($conexao, $idComunidade);

    header("Location: ../visao/comunidades/index.php?msg=Comunidade $idComunidade excluída!");
} else {
    header("Location: ../visao/comunidades/index.php?msg=Falha na exclusão!");
}
