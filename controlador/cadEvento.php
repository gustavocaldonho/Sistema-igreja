<?php

require_once "funcoesUteis.php";
require_once "../dao/conexao.php";
require_once "../dao/eventoDAO.php";

// var_dump($_POST);

$titulo = $_POST["tituloEvento"];
$descricao = $_POST["descricaoEvento"];
$data = $_POST["dataEvento"];
$horario = $_POST["horarioEvento"];
$local = $_POST["localEvento"];
$presidente = $_POST["presidenteEvento"];
// $status = $_POST["radioEvento"];

// usado na edição do evento
$id_evento = $_POST["id_evento"];

// data e horario não podem assumir qualquer valor (estão definidos os types nos inputs)
$msgErro = validarEvento($titulo, $descricao, $data, $horario, $local, $presidente);
$conexao = conectar();

if ($id_evento != "") { //atualizar

    if (empty($msgErro)) {
        // eventoDAO
        updateEvento($conexao, $id_evento, $titulo, $descricao, $data, $horario, $local, $presidente);

        header("Location: ../visao/homepage/index.php?msg=Evento atualizado com sucesso");
    } else {
        header("Location: ../visao/homepage/index.php?msg=$msgErro");
    }
} else { //cadastrar

    if (empty($msgErro)) {
        // eventoDAO
        cadastrarEvento($conexao, $titulo, $descricao, $data, $horario, $local, $presidente);

        header("Location: ../visao/homepage/index.php?msg=Evento inserido com sucesso");
    } else {
        header("Location: ../visao/homepage/index.php?msg=$msgErro");
    }
}
