<?php
include_once("../dao/conexao.php");
include_once("../dao/familiaDAO.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_familia = $_POST["id_familia"];
    $cod = $_POST["cod"];

    $conexao = conectar();

    ativarEDesativarFamilia($conexao, $id_familia, $cod);

    echo "opa";
}
