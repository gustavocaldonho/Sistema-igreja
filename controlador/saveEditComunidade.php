<?php

include_once '../dao/conexao.php';
include_once '../controlador/funcoesUteis.php';
include_once '../dao/comunidadeDAO.php';

$id_comunidade = $_POST['inputIdComunidade'];
$padroeiro = $_POST['inputPadroeiro'];
$localizacao = $_POST['inputLocalizacao'];
$email = $_POST['inputEmail'];

// Validando as atualizações dos dados
$msgErro = validarComunidade($padroeiro, $localizacao, $email);

// echo $id_comunidade . "<br>";
// echo $padroeiro . "<br>";
// echo $localizacao . "<br>";
// echo $email. "<br>";
// echo "Erros: " . $msgErro;

// Atualizando os dados no banco
if (empty($msgErro)) {

    $conexao = conectar();

    // comunidadeDAO
    updateComunidade($conexao, $id_comunidade, $padroeiro, $localizacao, $email);

    header("Location: ../visao/comunidades/index.php?msg=Comunidade $padroeiro atualizada com sucesso!");
} else {
    // Se houver erro em alguma informação inserida, ao clicar em Cadastrar, ocorrerá uma atualização da tela com os mesmos dados (modificados ou não). 
    header("Location: ../visao/cad-com/edit.php?msg=<b>Campos Inválidos:</b><br> $msgErro&id_comunidade=$id_comunidade&padroeiro=$padroeiro&localizacao=$localizacao&email=$email");
}