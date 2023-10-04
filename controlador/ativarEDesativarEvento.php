<?php
include_once("../dao/conexao.php");
include_once("../dao/eventoDAO.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_evento = $_POST["id_evento"];
    $cod = $_POST["cod"];

    $conexao = conectar();

    ativarEDesativarEvento($conexao, $id_evento, $cod);

    // echo "opa";
}
