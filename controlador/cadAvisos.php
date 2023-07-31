<?php

require_once "funcoesUteis.php";
require_once "../dao/conexao.php";
require_once "../dao/avisoDAO.php";

// var_dump($_POST);

$titulo = $_POST["tituloAviso"];
$descricao = $_POST["msgAviso"];
$status = $_POST["radioAviso"];

$msgErro = validarAviso($titulo, $descricao);

if (empty($msgErro)) {
    // echo "tudo certo";
    $conexao = conectar();
    cadastrarAviso($conexao, $titulo, $descricao, $status);

    header("Location: ../visao/homepage/index.php?msg=Aviso inserido com sucesso");
} else {
    // echo "$msgErro";
    header("Location: ../visao/homepage/index.php?msg=$msgErro");
}
