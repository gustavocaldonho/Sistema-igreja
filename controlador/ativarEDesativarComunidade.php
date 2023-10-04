<?php
include_once("../dao/conexao.php");
include_once("../dao/comunidadeDAO.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_comunidade = $_POST["id_comunidade"];
    $cod = $_POST["cod"];

    $conexao = conectar();

    ativarEDesativarComunidade($conexao, $id_comunidade, $cod);

    // echo "opa";
}
