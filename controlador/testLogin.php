<?php

session_start();

if (isset($_POST["submit"]) && !empty($_POST["inputCpf"]) && !empty($_POST["inputSenha"])) {

    include_once("../dao/conexao.php");
    include_once("../dao/loginDAO.php");

    $cpf = $_POST["inputCpf"];
    $senha = $_POST["inputSenha"];

    $cpfLimpo = preg_replace('/[^0-9]/is', '', $cpf);

    $conexao = conectar();

    // Verificando se o cpf existe na base de dados:
    $result = getDadosLogin($conexao, $cpfLimpo);
    if (mysqli_num_rows($result) !== 1) {
        unset($_SESSION["cpf"]);
        unset($_SESSION["senha"]);
        header("Location: ../visao/login/index.php?msg=CPF não cadastrado.");
    } else {
        // Verificando se a senha está correta:
        $result = acessarLogin($conexao, $cpfLimpo, $senha);
        if (mysqli_num_rows($result) < 1) {
            unset($_SESSION["cpf"]);
            unset($_SESSION["senha"]);
            header("Location: ../visao/login/index.php?msg=Senha incorreta.");
        } else {
            // Caso exista o cadastro na base de dados, o login é efetuado;
            $_SESSION["cpf"] = $cpfLimpo;
            $_SESSION["senha"] = $senha;
            header("Location: ../visao/homepage/index.php");
        }
    }
} else {
    header("Location: ../visao/login/index.php?msg=Digite todos os dados!");
}
