<?php

require_once '../dao/familiaDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

// Dados da família
$nomeFamilia = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$idComunidade = $_POST["listaComunidades"];

// Dados dos membros da família
$nomeMb1 = $_POST["inputNomeMb1"];
$nomeMb2 = $_POST["inputNomeMb2"];
$nomeMb3 = $_POST["inputNomeMb3"];
$nomeMb4 = $_POST["inputNomeMb4"];
$nomeMb5 = $_POST["inputNomeMb5"];

$cpfMb1 = limparMascaraCpf($_POST["inputCpfMb1"]);
$cpfMb2 = limparMascaraCpf($_POST["inputCpfMb2"]);
$cpfMb3 = limparMascaraCpf($_POST["inputCpfMb3"]);
$cpfMb4 = limparMascaraCpf($_POST["inputCpfMb4"]);
$cpfMb5 = limparMascaraCpf($_POST["inputCpfMb5"]);

$dnMb1 = alterarOrdemDN($_POST["inputDNMb1"]);
$dnMb2 = $_POST["inputDNMb2"];
$dnMb3 = $_POST["inputDNMb3"];
$dnMb4 = $_POST["inputDNMb4"];
$dnMb5 = $_POST["inputDNMb5"];

$celMb1 = $_POST["inputCelMb1"];
$celMb2 = $_POST["inputCelMb2"];
$celMb3 = $_POST["inputCelMb3"];
$celMb4 = $_POST["inputCelMb4"];
$celMb5 = $_POST["inputCelMb5"];

// echo "$nomeFamilia<br>$email<br> $idComunidade <br>$nomeMb1<br> $nomeMb2 <br>$nomeMb3<br> $nomeMb4 <br>$nomeMb5<br> $cpfMb1 <br>$cpfMb2<br> $cpfMb3<br> $cpfMb4<br> $cpfMb5 <br>$dnMb1<br>$dnMb2<br>$dnMb3<br>$dnMb4<br>$dnMb5<br>$celMb1<br>$celMb2<br>$celMb3<br>$celMb4<br>$celMb5";

// echo "$nomeFamilia<br>$email<br>$idComunidade <br>$nomeMb1<br>$cpfMb1 ##### <br>$dnMb1<br>$celMb1";


// Validando os dados de entrada
// $msgErro = validarComunidade($padroeiro, $localizacao, $email);
$msgErro = "";

if (empty($msgErro)) {
    $conexao = conectar();

    // familiaDAO
    $idFamilia = cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade);

    // cadastrarMembrosTeste($conexao, $cpfMb1, $nomeMb1, $dnMb1, $celMb1, $idFamilia);

    cadastrarMembros($conexao, $idFamilia, $nomeMb1, $nomeMb2, $nomeMb3, $nomeMb4, $nomeMb5, $cpfMb1, $cpfMb2, $cpfMb3, $cpfMb4, $cpfMb5, $dnMb1, $dnMb2, $dnMb3, $dnMb4, $dnMb5, $celMb1, $celMb2, $celMb3, $celMb4, $celMb5);

    header("Location: ../visao/cad-fml/index.php?msg=Familia <b>$nomeFamilia ($idFamilia)</b> cadastrada com Sucesso!");
} else {
    // ERRO
    header("Location: ../visao/cad-fml/index.php?msg=<b>Campos Inválidos:</b><br> $msgErro");
}
