<?php

require_once '../dao/comunidadeDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

// var_dump($_POST);

$padroeiro = $_POST["inputPadroeiro"];
$localizacao = $_POST["inputLocalizacao"];
$email = $_POST["inputEmail"];
// sempre receberá um id pelo POST (se for primeiro cadastro, o valor padrão é zero; se for edição, receberá o id da comunidade a ser editada)
$id_comunidade = $_POST["inputIdComunidade"];

// Validando os dados de entrada (não importa se é edição ou primeiro cadastro)
$msgErro = "";
$msgErro .= validarLocalizacao($localizacao);
$msgErro .= validarEmail($email);

// se receber um id, é porque se trata de uma edição do cadastro
if ($id_comunidade != "") {
    // echo "diferente vazio";
    $msgErro .= validarPadroeiroUpdate($padroeiro, $id_comunidade);

    // Atualizando os dados no banco
    if (empty($msgErro)) {

        $conexao = conectar();

        // comunidadeDAO
        updateComunidade($conexao, $id_comunidade, $padroeiro, $localizacao, $email);

        header("Location: ../visao/comunidades/index.php?cod=1&msg=Comunidade $padroeiro atualizado(a) com sucesso!");
    } else {
        // Se houver erro em alguma informação inserida, ao clicar em Cadastrar, ocorrerá uma atualização da tela com os mesmos dados (modificados ou não). 
        header("Location: ../visao/cad-com/index.php?cod=0&action=saveEditComunidade.php&msg=Campos Inválidos: $msgErro&id_comunidade=$id_comunidade&padroeiro=$padroeiro&localizacao=$localizacao&email=$email");
    }
} else {
    // echo "igual a vazio";
    $msgErro .= validarPadroeiro($padroeiro);

    if (empty($msgErro)) {
        $conexao = conectar();

        // comunidadeDAO
        cadastrarComunidade($conexao, $padroeiro, $localizacao, $email);

        header("Location: ../visao/cad-com/index.php?cod=1&msg=Comunidade <u>$padroeiro</u> foi inserido(a) com sucesso!");
    } else {
        // ERRO
        header("Location: ../visao/cad-com/index.php?cod=0&msg=Campos Inválidos: $msgErro&padroeiro=$padroeiro&localizacao=$localizacao&email=$email");
    }
}
