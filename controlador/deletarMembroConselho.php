<?php

// var_dump($_GET);

include_once("../dao/conexao.php");
include_once("../dao/loginDAO.php");
include_once("../dao/membroConselhoDAO.php");
include_once("../dao/membroFamiliaDAO.php");

$cpf = $_GET["id"];
$id_comunidade = $_GET["id_comunidade"];

$conexao = conectar();

// seta o perfil do login (volta para 0)
resetarLoginMembroConselho($conexao, $cpf); //loginDAO

// excluir na tabela membros conselho
deleteMembroConselho($conexao, $cpf); //membroConselhoDAO


header("Location: ../visao/perfil-com/index.php?id_comunidade=$id_comunidade&msg=Membro $cpf excluído(a) com sucesso!");
