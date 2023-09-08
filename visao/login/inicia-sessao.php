<?php

session_start();
// print_r($_SESSION);

if ((!isset($_SESSION["cpf"]) == true) and (!isset($_SESSION["senha"]) == true)) {

    unset($_SESSION["cpf"]);
    unset($_SESSION["senha"]);
    header("Location: ../login/index.php");
} else {

    include_once("../../dao/conexao.php");
    include_once("../../dao/familiaDAO.php");
    include_once("../../dao/comunidadeDAO.php");
    include_once("../../dao/loginDAO.php");
    include_once("../login/funcoesPHP.php");

    $conexao = conectar();

    // Buscando o código de perfil do membro
    $resLogin = getDadosLogin($conexao, $_SESSION["cpf"]); // loginDAO
    $codPerfil = getCodPerfil($resLogin); // login/funcoesPHP
    $_SESSION['codPerfil'] = $codPerfil;

    // Buscando os dados do membro (id_familia)
    $resMembro = getDadosMembrosFamiliaLogin($conexao, $_SESSION["cpf"]); // loginDAO
    $arrayDadosMembro = getDadosMembroLogado($resMembro); // login/funcoesPHP
    $_SESSION['id_familia'] = $arrayDadosMembro[3];

    // Buscando o id_comunidade que está vinculado a família
    $resFamilia = getDadosFamilia($conexao, $_SESSION['id_familia']); // familiaDAO
    $arrayDadosFamilia = getDadosFamiliaPerfil($resFamilia); // login/funcoesPHP
    $_SESSION['id_comunidade'] = $arrayDadosFamilia[2];

    $explodeNome = explode(" ", $arrayDadosMembro[0]);
    // print_r(var_dump($explodeNome[0]));

    // $logado = $_SESSION["cpf"];
}