<?php
include_once("../dao/conexao.php");
include_once("../dao/avisoDAO.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_aviso = $_POST["id_aviso"];
    $cod = $_POST["cod"];

    $conexao = conectar();

    ativarEDesativarAviso($conexao, $id_aviso, $cod);

    // echo "opa";
}
