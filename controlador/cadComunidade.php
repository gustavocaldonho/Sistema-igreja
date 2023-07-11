<?php

require_once '../dao/comunidadeDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

$padroeiro = $_POST["inputPadroeiro"];
$localizacao = $_POST["inputLocalizacao"];
$email = $_POST["inputEmail"];

// Validando os dados de entrada
$msgErro = validarComunidade($padroeiro, $localizacao, $email);

if (empty($msgErro)) {
    $conexao = conectar();

    // comunidadeDAO
    cadastrarComunidade($conexao, $padroeiro, $localizacao, $email);
    
    header("Location: ../visao/cad-com/index.php?msg=Comunidade <b>$padroeiro</b> cadastrada com Sucesso!");
} else {
    // ERRO
    header("Location: ../visao/cad-com/index.php?msg=<b>Campos Inválidos:</b><br> $msgErro");
}
