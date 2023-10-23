<?php
include_once("../dao/conexao.php");
include_once("../dao/dizimoDAO.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_familia = $_POST["id_familia"];
    $mes = $_POST["mes"];

    $conexao = conectar();

    // seleciona os pagamentos
    $pagamento = selectPagamento($conexao, $id_familia, $mes);

    while ($user_data = mysqli_fetch_assoc($pagamento)) {
        $status = $user_data["status"];
    }

    echo $status;

    // echo "opa";
}
