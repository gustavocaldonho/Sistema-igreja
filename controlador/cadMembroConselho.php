<?php

include_once "../dao/conexao.php";
include_once "../dao/membroFamiliaDAO.php";
include_once "../dao/loginDAO.php";

var_dump($_POST);

$cpf = $_POST["listaMembros"];
$cargo = $_POST["inputCargo"];

$id_comunidade = $_POST["id_comunidade"];

// Verifica se foi selecionada alguma opção, se não, value (cpf) == 0.
if ($cpf != 0) {
    $conexao = conectar();
    updateLoginMembroConselho($conexao, $cpf);
    cadastrarMembroConselho($conexao, $cpf, $cargo);
}

header("Location: ../visao/perfil-com/index.php?id_comunidade=$id_comunidade&msg=Membro $cpf adicionado(a) com sucesso!");
