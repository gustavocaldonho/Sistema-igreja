<?php

require_once "funcoesUteis.php";
require_once "../dao/conexao.php";
require_once "../dao/avisoDAO.php";

// var_dump($_POST);

$titulo = $_POST["tituloAviso"];
$descricao = $_POST["descricaoAviso"];
$abrangencia = $_POST["radioAviso"];
$id_comunidade = $_POST["id_comunidade"];

// usado na edição
$id_aviso = $_POST["id_aviso"];

$msgErro = validarAviso($titulo, $descricao);
$conexao = conectar();

// se for recebido o id do aviso, é porque se trata da edição
if ($id_aviso != "") { //atualização

    if (empty($msgErro)) {
        updateAviso($conexao, $id_aviso, $titulo, $descricao, $abrangencia); //avisoDAO

        header("Location: ../visao/homepage/index.php?msg=Aviso atualizado com sucesso");
    } else {
        header("Location: ../visao/homepage/index.php?msg=$msgErro");
    }
} else { //cadastro
    if (empty($msgErro)) {
        cadastrarAviso($conexao, $titulo, $descricao, $abrangencia, $id_comunidade); //avisoDAO


        header("Location: ../visao/homepage/index.php?msg=Aviso inserido com sucesso");
    } else {
        header("Location: ../visao/homepage/index.php?msg=$msgErro");
    }
}