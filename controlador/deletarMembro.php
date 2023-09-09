<?php

include_once '../dao/conexao.php';
include_once '../dao/familiaDAO.php';

// var_dump($_GET);

$id_membro = $_GET['id'];

if ($id_membro > 0) {

    $conexao = conectar();

    // familiaDAO
    deleteMembroPerfilFamilia($conexao, $id_membro);

    header("Location: ../visao/perfil-fml/index.php?msg=Membro $id_membro excluído!");
} else {
    header("Location: ../visao/perfil-fml/index.php?msg=Falha na exclusão!");
}
