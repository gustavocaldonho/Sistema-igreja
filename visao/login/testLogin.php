<?php

session_start();
// print_r($_REQUEST);

if (isset($_POST["submit"]) && !empty($_POST["inputCpf"]) && !empty($_POST["inputSenha"])) {

    include_once("../../dao/conexao.php");
    // include_once("../../controlador/funcoesUteis.php");

    $cpf = $_POST["inputCpf"];
    $senha = $_POST["inputSenha"];

    $cpfLimpo = preg_replace('/[^0-9]/is', '', $cpf);

    // print_r("Cpf: " . $cpfLimpo . "<br> Senha: " . $senha);

    $sql = "SELECT * FROM bd_sistema.login WHERE membro_familia_cpf = '$cpfLimpo' AND senha = '$senha'";
    $conexao = conectar();

    $result = mysqli_query($conexao, $sql);

    // print_r($sql);
    // print_r($result);

    if (mysqli_num_rows($result) < 1) {

        unset($_SESSION["cpf"]);
        unset($_SESSION["senha"]);
        header("Location: index.php");
    } else {

        $_SESSION["cpf"] = $cpfLimpo;
        $_SESSION["senha"] = $senha;
        header("Location: ../homepage/index.php");
    }
} else {

    header("Location: index.php");
}
