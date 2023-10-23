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

    // seleciona os pagamentos
    $pagamento = selectPagamento($conexao, $id_familia, $mes);

    // conta a quantidade de pagamentos referentes ao mês em questão (qtd linhas) -> não pode passar de uma
    $contador = 0;
    while ($user_data = mysqli_fetch_assoc($pagamento)) {
        $contador++;
    }

    // verifica se é para inserir um novo pagamento ou alterar o status de um já existente
    if ($cod == 0) {
        // verifica se já foi feito algum pagamento no referido mês
        if ($contador == 0) {
            inserirPagamento($conexao, $id_pagamento, $id_familia, $mes, $status);
        }
    } else {
        alterarStatus($conexao, $id_familia, $mes, $status);
    }

    // echo "opa";
}
