<?php 

require_once '../dao/comunidadeDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

$padroeiro = $_POST["inputPadroeiro"];
$localizacao = $_POST["inputLocalizacao"];
$email = $_POST["inputEmail"];

// $msgErro = validarComunidade($padroeiro, $localizacao, $email);

if(empty($msgErro)){
    $conexao = conectar();

    cadastrarComunidade($conexao, $padroeiro, $localizacao, $email);
    header("Location: ../visao/cad-com/index.php?msg=Comunidade $padroeiro cadastrada com Sucesso!");
}

?>