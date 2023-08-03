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
$status = $_POST["radioEvento"];

// data e horario não podem assumir qualquer valor (estão definidos os types nos inputs)
$msgErro = validarEvento($titulo, $descricao, $local, $presidente);

if (empty($msgErro)) {
    // echo "tudo certo";
    $conexao = conectar();

    // eventoDAO
    updateEvento($conexao, $id_evento, $status, $titulo, $descricao, $data, $horario, $local, $presidente);

    header("Location: ../visao/homepage/index.php?msg=Evento atualizado com sucesso");
} else {
    // echo "$msgErro";
    header("Location: ../visao/homepage/index.php?msg=$msgErro");
}
