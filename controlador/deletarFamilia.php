<?php

include_once "../dao/conexao.php";
include_once "../dao/familiaDAO.php";
include_once '../dao/membroFamiliaDAO.php';

$id_familia = $_GET["id_familia"];

if (isset($id_familia)) {
    $conexao = conectar();

    deleteMembros($conexao, $id_familia); // membroFamiliaDAO
    deleteFamilia($conexao, $id_familia); // familiaDAO

    header("Location: ../visao/familias/index.php?msg=Família excluída com sucesso!");
} else {
    header("Location: ../visao/familias/index.php?msg=Falha na exclusão");
}
