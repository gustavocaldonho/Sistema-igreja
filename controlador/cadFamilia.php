<?php

require_once '../dao/familiaDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

// var_dump($_POST);

$qtdMembros = $_POST["controleCampos"];
// echo ("<br>" . $_POST["controleCampos"]);

// Dados da família
$nomeFamilia = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$idComunidade = $_POST["listaComunidades"];

// Validando os dados de entrada
// $msgErro = validarComunidade($padroeiro, $localizacao, $email);
$msgErro = ""; // #######################################

if (empty($msgErro)) {
    $conexao = conectar();

    // familiaDAO
    $idFamilia = cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade);

    $contador = 1;

    // Dados dos membros da família
    while ($contador <= $qtdMembros) {
        $nomeMb = $_POST["inputNomeMb" . $contador];
        $cpfMb = limparMascaraCpf($_POST["inputCpfMb" . $contador]);
        $dnMb = alterarOrdemDN($_POST["inputDNMb" . $contador]);
        $celMb = $_POST["inputCelMb" . $contador];

        cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $idFamilia);

        // echo "<br><br>$nomeMb<br>$cpfMb<br>$dnMb<br>$celMb";

        $contador++;
    }

    header("Location: ../visao/cad-fml/index.php?msg=Familia <b>$nomeFamilia ($idFamilia)</b> cadastrada com Sucesso!");
} else {
    // ERRO
    header("Location: ../visao/cad-fml/index.php?msg=<b>Campos Inválidos:</b><br> $msgErro");
}
