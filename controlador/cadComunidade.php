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
$foto = $_FILES["inputFoto"];

// Validando os dados de entrada (não importa se é edição ou primeiro cadastro)
$msgErro = "";
$msgErro .= validarLocalizacao($localizacao);
$msgErro .= validarEmail($email);
$msgErro .= validarImagem($foto);

// se receber um id, é porque se trata de uma edição do cadastro
if ($id_comunidade != "") {
    $msgErro .= validarPadroeiroUpdate($padroeiro, $id_comunidade);

    // Atualizando os dados no banco
    if (empty($msgErro)) {

        $conexao = conectar();

        // comunidadeDAO
        updateComunidade($conexao, $id_comunidade, $padroeiro, $localizacao, $email);

        if ($foto["size"] > 0) {
            updateFotoComunidade($conexao, $id_comunidade, $foto);
        }

        header("Location: ../visao/comunidades/index.php?cod=1&msg=Comunidade $padroeiro atualizado(a) com sucesso!");
    } else {
        // Se houver erro em alguma informação inserida, ao clicar em Cadastrar, ocorrerá uma atualização da tela com os mesmos dados (modificados ou não). 
        header("Location: ../visao/cad-com/index.php?cod=0&msg=Campos Inválidos: $msgErro&id_comunidade=$id_comunidade&padroeiro=$padroeiro&localizacao=$localizacao&email=$email");
    }
} else {
    $msgErro .= validarPadroeiro($padroeiro);

    if (empty($msgErro)) {
        $conexao = conectar();

        // comunidadeDAO
        $id_comunidade = cadastrarComunidade($conexao, $padroeiro, $localizacao, $email);

        // a foto não é obrigatória
        if ($foto["size"] > 0) {
            updateFotoComunidade($conexao, $id_comunidade, $foto);
        }

        header("Location: ../visao/cad-com/index.php?cod=1&msg=Comunidade <i><b>$padroeiro</b></i> foi inserida com sucesso!");
    } else {
        // ERRO
        header("Location: ../visao/cad-com/index.php?cod=0&msg=Campos Inválidos: $msgErro&padroeiro=$padroeiro&localizacao=$localizacao&email=$email");
    }
}
