<?php

require_once '../dao/conexao.php';
// require_once '../controlador/funcoesUteis.php';

// Cadastro Chefe do Conselho
$nomeChefe = $_POST["inputNomeChefe"];
$cpfChefe = $_POST["inputCpf"];
$emailChefe = $_POST["inputEmail"];
$celChefe = $_POST["inputCel"];

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
// $msgErro = validarCampos($idMedico, $nomePaciente, $email, $telefone, $data, $hora);
$msgErro = "";

if (empty($msgErro)) {
    $conexao = conectar();

    // Cadastro dos Membros do Conselho da Comunidade
    // ***** Código para pegar o id da comunidade de acordo com o cpf do chefe do conselho

    // Membro 1
    $sqlMb1 = "INSERT INTO bd_sistema.membro_conselho (cpf, nome, celular, idcomunidade) VALUES ('$cpfMb1', '$nomeMb1', '$celMb1', '1')";
    mysqli_query($conexao, $sqlMb1) or die(mysqli_error($conexao));

    // Membro 2
    $sqlMb2 = "INSERT INTO bd_sistema.membro_conselho (cpf, nome, celular, idcomunidade) VALUES ('$cpfMb2', '$nomeMb2', '$celMb2', '1')";
    mysqli_query($conexao, $sqlMb2) or die(mysqli_error($conexao));

    // Membro 3
    $sqlMb3 = "INSERT INTO bd_sistema.membro_conselho (cpf, nome, celular, idcomunidade) VALUES ('$cpfMb3', '$nomeMb3', '$celMb3', '1')";
    mysqli_query($conexao, $sqlMb3) or die(mysqli_error($conexao));


    // Cadastro do Chefe do Conselho
    $sqlChefe = "INSERT INTO bd_sistema.chefe_conselho (cpf, nome, email, celular) VALUES ('$cpfChefe', '$nomeChefe', '$emailChefe', '$celChefe')";
    // mysqli_query($conexao, $sqlChefe) or die (mysqli_error($conexao));
    // Inserir no banco os seus dados de login (senha padrao-cpf)


    // Cadastro da Comunidade (o Chefe da comunidade já deve estar cadastrado)
    $sqlComunidade = "INSERT INTO bd_sistema.comunidade (padroeiro, localizacao, chefe_conselho_cpf) VALUES ('$padroeiro', '$localizacao', '$cpfChefe')";
    // mysqli_query($conexao, $sqlComunidade) or die(mysqli_error($conexao));

    // $id = mysqli_insert_id($conexao);

    header("Location:../visao/cad-com/index.php?msg=Comunidade inserida com sucesso.");

} else {
    // ERRO
    header("Location:../visao/formAgenda.php?msg=<b>Campos Inválidos:</b><br>$msgErro");
}
