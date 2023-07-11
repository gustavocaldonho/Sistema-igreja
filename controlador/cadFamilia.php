<?php

// require_once '../dao/comunidadeDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

// Dados da família
$nomeFamilia = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$celular = $_POST["inputCel"];
$idComunidade = $_POST["listaComunidades"];

// Dados dos membros da família
$nomeMb1 = $_POST["inputNomeMb1"];
$nomeMb2 = $_POST["inputNomeMb2"];
$nomeMb3 = $_POST["inputNomeMb3"];
$nomeMb4 = $_POST["inputNomeMb4"];
$nomeMb5 = $_POST["inputNomeMb5"];

$cpfMb1 = $_POST["inputCpfMb1"];
$cpfMb2 = $_POST["inputCpfMb2"];
$cpfMb3 = $_POST["inputCpfMb3"];
$cpfMb4 = $_POST["inputCpfMb4"];
$cpfMb5 = $_POST["inputCpfMb5"];

// echo "$nomeFamilia<br>$email<br> $celular <br>$nomeMb1<br> $nomeMb2 <br>$nomeMb3<br> $nomeMb4 <br>$nomeMb5<br> $cpfMb1 <br>$cpfMb2<br> $cpfMb3<br> $cpfMb4<br> $cpfMb5<br> $idComunidade";

// Validando os dados de entrada
// $msgErro = validarComunidade($padroeiro, $localizacao, $email);

// if (empty($msgErro)) {
//     $conexao = conectar();

//     // ComunidadeDAO
//     cadastrarComunidade($conexao, $padroeiro, $localizacao, $email);
    
//     header("Location: ../visao/cad-com/index.php?msg=Comunidade <b>$padroeiro</b> cadastrada com Sucesso!");
// } else {
//     // ERRO
//     header("Location: ../visao/cad-com/index.php?msg=<b>Campos Inválidos:</b><br> $msgErro");
// }