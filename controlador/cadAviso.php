<?php

require_once "funcoesUteis.php";
require_once "../dao/conexao.php";
require_once "../dao/avisoDAO.php";

// var_dump($_POST);

$titulo = $_POST["tituloAviso"];
$descricao = $_POST["descricaoAviso"];
$status = $_POST["radioAviso"];

// usado na edição
$id_aviso = $_POST["id_aviso"];

$msgErro = validarAviso($titulo, $descricao);
$conexao = conectar();

// se for recebido o id do aviso, é porque se trata da edição
if ($id_aviso != "") { //atualização

    if (empty($msgErro)) {
        updateAviso($conexao, $id_aviso, $titulo, $descricao, $status); //avisoDAO

        header("Location: ../visao/homepage/index.php?msg=Aviso atualizado com sucesso");
    } else {
        header("Location: ../visao/homepage/index.php?msg=$msgErro");
    }
} else { //cadastro
    if (empty($msgErro)) {
        cadastrarAviso($conexao, $titulo, $descricao, $status); //avisoDAO


        header("Location: ../visao/homepage/index.php?msg=Aviso inserido com sucesso");
    } else {
        header("Location: ../visao/homepage/index.php?msg=$msgErro");
    }
}
