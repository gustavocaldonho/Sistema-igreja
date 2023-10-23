<?php
include_once("../dao/conexao.php");
include_once("../dao/dizimoDAO.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_pagamento = $_POST["id_pagamento"];
    $id_familia = $_POST["id_familia"];
    $mes = $_POST["mes"];
    $status = $_POST["status"];

    // se cod == 0 -> inserir; cod == 1 -> alterar 
    $cod = $_POST["cod"];

    $conexao = conectar();

    $pagamento = selectPagamento($conexao, $id_familia, $mes);

    $contador = 0;
    while ($user_data = mysqli_fetch_assoc($pagamento)) {
        $contador++;
    }

    if ($cod == 0) {
        if ($contador == 0) {
            inserirPagamento($conexao, $id_pagamento, $id_familia, $mes, $status);
        }
    } else {
        alterarStatus($conexao, $id_familia, $mes, $status);
    }

    // echo "opa";
}
