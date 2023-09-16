<?php

session_start();

if (isset($_POST["submit"]) && !empty($_POST["inputCpf"]) && !empty($_POST["inputSenha"])) {

    include_once("../dao/conexao.php");
    include_once("../dao/loginDAO.php");

    $cpf = $_POST["inputCpf"];
    $senha = $_POST["inputSenha"];

    $cpfLimpo = preg_replace('/[^0-9]/is', '', $cpf);

    $conexao = conectar();

    $result = acessarLogin($conexao, $cpfLimpo, $senha);

    if (mysqli_num_rows($result) < 1) {

        unset($_SESSION["cpf"]);
        unset($_SESSION["senha"]);
        header("Location: ../visao/login/index.php");
    } else {

        $_SESSION["cpf"] = $cpfLimpo;
        $_SESSION["senha"] = $senha;
        header("Location: ../visao/homepage/index.php");
    }
} else {

    header("Location: ../visao/login/index.php");
}
