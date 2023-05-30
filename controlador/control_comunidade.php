<?php

require_once '../dao/conexao.php';
require_once '../dao/chefeConselhoDAO.php';
require_once '../dao/membrosConselhoDAO.php';
require_once '../dao/comunidadeDAO.php';
require_once '../controlador/funcoesUteis.php';

// Cadastro Chefe do Conselho
$nomeChefe = $_POST["inputNomeChefe"];
$cpfChefe = $_POST["inputCpfChefe"];
$emailChefe = $_POST["inputEmail"];
$celChefe = $_POST["inputCelChefe"];

// Cadastro Comunidade
$padroeiro = $_POST["inputPadroeiro"];
$localizacao = $_POST["inputLocalização"];
// Também entra na tabela o cpf do chefe do conselho

// Cadastro Membros
$nomeMb1 = $_POST["inputNomeMb1"];
$nomeMb2 = $_POST["inputNomeMb2"];
$nomeMb3 = $_POST["inputNomeMb3"];
$cpfMb1 = $_POST["inputCpfMb1"];
$cpfMb2 = $_POST["inputCpfMb2"];
$cpfMb3 = $_POST["inputCpfMb3"];
$celMb1 = $_POST["inputCelMb1"];
$celMb2 = $_POST["inputCelMb2"];
$celMb3 = $_POST["inputCelMb3"];

// echo $chefeConselho . "</br>";
// echo $cpfChefe . "</br>";
// echo $emailChefe . "</br>";
// echo $celChefe . "</br>";
// echo $padroeiro . "</br>";
// echo $localizacao . "</br>";
// echo $nomeMb1 . "</br>";
// echo $nomeMb2 . "</br>";
// echo $nomeMb3 . "</br>";
// echo $cpfMb1 . "</br>";
// echo $cpfMb2 . "</br>";
// echo $cpfMb3 . "</br>";
// echo $celMb1 . "</br>";
// echo $celMb2 . "</br>";
// echo $celMb3 . "</br>";


// Validando os dados:
$msgErro = validarCampos($nomeChefe, $cpfChefe, $emailChefe, $celChefe, $padroeiro, $localizacao, $nomeMb1, $nomeMb2, $nomeMb3, $cpfMb1, $cpfMb2, $cpfMb3, $celMb1, $celMb2, $celMb3);

// Verificar se já tem os dados no banco (impedir a entrada de cpf duplicado)

if (empty($msgErro)) {
    //$conexao = conectar();

    //cadastrarChefe($conexao, $cpfChefe, $nomeChefe, $emailChefe, $celChefe);
    //cadastrarComunidade($conexao, $padroeiro, $localizacao, $cpfChefe);

    //Pegando o id da comunidade para passar no cadastro dos membros
    //$idComunidade = selectIdComunidade($conexao, $cpfChefe);

    //cadastrarMembros($conexao, $idComunidade, $cpfMb1, $cpfMb2, $cpfMb3, $nomeMb1, $nomeMb2, $nomeMb3, $celMb1, $celMb2, $celMb3);

    header("Location: ../visao/cad-com/index.php?msg=Comunidade $padroeiro cadastrada com sucesso!&idComunidade=$idComunidade");
} else {
    // ERRO
    header("Location: ../visao/cad-com/index.php?msg=Campos Inválidos: $msgErro");
}