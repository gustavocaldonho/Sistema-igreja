<?php 

include_once "../dao/conexao.php";
include_once "../dao/familiaDAO.php";

$id_familia = $_GET["id_familia"];

if(isset($id_familia)){
    $conexao = conectar();

    // familiaDAO
    deleteMembros($conexao, $id_familia);
    deleteFamilia($conexao, $id_familia);

    header("Location: ../visao/familias/index.php?msg=Família excluída com sucesso!");
} else{
    header("Location: ../visao/familias/index.php?msg=Falha na exclusão");
}

?>