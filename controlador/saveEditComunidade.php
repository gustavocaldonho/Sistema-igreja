<?php

include_once '../dao/conexao.php';
include_once '../controlador/funcoesUteis.php';
include_once '../dao/comunidadeDAO.php';

$id_comunidade = $_POST['inputIdComunidade']; //# 
$padroeiro = $_POST['inputPadroeiro'];
$localizacao = $_POST['inputLocalizacao'];
$email = $_POST['inputEmail'];

// Validando as atualizações dos dados
$msgErro = validarComunidade($padroeiro, $localizacao, $email);

// Atualizando os dados no banco
if (empty($msgErro)) {

    $conexao = conectar();

    // comunidadeDAO
    updateComunidade($conexao, $id_comunidade, $padroeiro, $localizacao, $email); //# 

    header("Location: ../visao/comunidades/index.php?cod=1&msg=Comunidade $padroeiro atualizada com sucesso!"); //# 
} else {
    // Se houver erro em alguma informação inserida, ao clicar em Cadastrar, ocorrerá uma atualização da tela com os mesmos dados (modificados ou não). 
    header("Location: ../visao/cad-com/index.php?cod=0&msg=Campos Inválidos: $msgErro&id_comunidade=$id_comunidade&padroeiro=$padroeiro&localizacao=$localizacao&email=$email"); //# 
}