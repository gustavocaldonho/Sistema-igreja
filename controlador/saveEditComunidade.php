<?php

include_once '../dao/conexao.php';
include_once '../controlador/funcoesUteis.php';
include_once '../dao/comunidadeDAO.php';

$id = $_POST['inputId'];
$padroeiro = $_POST['inputPadroeiro'];
$localizacao = $_POST['inputLocalizacao'];
$email = $_POST['inputEmail'];

$msgErro = validarComunidade($padroeiro, $localizacao, $email);

echo $id . "<br>";
echo $padroeiro . "<br>";
echo $localizacao . "<br>";
echo $email. "<br>";
echo "Erros: " . $msgErro;

if (empty($msgErro)) {

    $conexao = conectar();

    // comunidadeDAO
    updateComunidade($conexao, $id, $padroeiro, $localizacao, $email);

    header("Location: ../visao/comunidades/index.php?msg=Comunidade $padroeiro atualizada com sucesso!");
} else {
    header("Location: ../visao/cad-com/edit.php?msg=<b>Campos Inválidos:</b><br> $msgErro");
}
