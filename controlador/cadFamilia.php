<?php

require_once '../dao/familiaDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

// var_dump($_POST);

$qtdMembros = $_POST["controleCampos"];

// Dados da família
$nomeFamilia = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$idComunidade = $_POST["listaComunidades"];

// Validando os dados de entrada da Família
$msgErroFamilia = validarFamilia($nomeFamilia, $email, $idComunidade);

// Validando os dados de entrada dos membros
$listaCpf = array(); // lista dos Cpfs dos membros
$msgErroMembros = "";
$contador = 1;
while ($contador <= $qtdMembros) {
    $nomeMb = $_POST["inputNomeMb" . $contador];
    $cpfMb = $_POST["inputCpfMb" . $contador];
    $dnMb = $_POST["inputDNMb" . $contador];
    // $celMb = $_POST["inputCelMb" . $contador]; // não é obrigatório possuir

    // inserindo os cpfs numa lista, a fim de verificar se tem algum duplicado
    array_push($listaCpf, $cpfMb);

    $msgErroMembros .= validarMembros($contador, $cpfMb, $nomeMb, $dnMb);
    $contador++;
}

// Verificando se foi inserido algum cpf repetido no formulário
$cpfDuplicado = array_count_values($listaCpf);
foreach($cpfDuplicado as $key => $value){
    if($value > 1){
        $msgErroMembros .= $key . " duplicado";
    }
}

if (empty($msgErroFamilia) && empty($msgErroMembros)) {
    $conexao = conectar();

    // familiaDAO
    // retorna o id da família que acabou de ser inserida, para que seus membros possam ser vinculados a ela
    $idFamilia = cadastrarFamilia($conexao, $nomeFamilia, $email, $idComunidade);

    $contador = 1;

    // Dados dos membros da família
    while ($contador <= $qtdMembros) {
        $nomeMb = $_POST["inputNomeMb" . $contador];
        $cpfMb = limparMascaraCpf($_POST["inputCpfMb" . $contador]);
        $dnMb = alterarOrdemDN($_POST["inputDNMb" . $contador]);
        $celMb = $_POST["inputCelMb" . $contador];

        // familiaDAO
        cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $idFamilia);
        $contador++;
    }

    header("Location: ../visao/cad-fml/index.php?msg=Familia <b>$nomeFamilia ($idFamilia)</b> cadastrada com Sucesso!");
} else {
    // ERRO
    header("Location: ../visao/cad-fml/index.php?msg=<b>Campos Inválidos:</b><br>$msgErroFamilia $msgErroMembros");
}
