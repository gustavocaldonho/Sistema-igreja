<?php
include_once "../dao/conexao.php";
include_once "../dao/membroFamiliaDAO.php";

var_dump($_POST);

$cpf = $_POST["listaMembros"];
$cargo = $_POST["inputCargo"];

$id_comunidade = $_POST["id_comunidade"];

if (($cpf != 0) && (isset($cargo))) {
    $conexao = conectar();
    cadastrarMembroConselho($conexao, $cpf);
}

header("Location: ../visao/perfil-com/index.php?id_comunidade=$id_comunidade&msg=Membro $cpf adicionado(a) com sucesso!");
