<?php

require_once '../dao/familiaDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

// var_dump($_POST);

// Dados da família
$nomeFamilia = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$id_comunidade = $_POST["listaComunidades"];
$qtdMembros = $_POST["controleCampos"];
$id_familia = $_POST['input_id_familia']; // se for primeiro cadastro, a família ainda não possui id (id = ""), se for edição, ela já possuirá um id

// Validando os dados de entrada dos membros
$listaCpf = array(); // lista dos Cpfs dos membros
$msgErroMembros = "";
$textMbHeader = "";
$contador = 1;
while ($contador <= $qtdMembros) {
    $nomeMb = $_POST["inputNomeMb" . $contador];
    $cpfMb = $_POST["inputCpfMb" . $contador];
    $dnMb = $_POST["inputDNMb" . $contador];
    $celMb = $_POST["inputCelMb" . $contador]; // não é obrigatório possuir

    // Caso ocorra algum erro, os dados são guardados para serem devolvidos a página de cadastro
    $textMbHeader .= "&cpfMb" . $contador . "=$cpfMb" . "&nomeMb" . $contador . "=$nomeMb" . "&dnMb" . $contador . "=$dnMb" . "&celMb" . $contador . "=$celMb";

    // inserindo os cpfs numa lista, a fim de verificar se tem algum duplicado
    array_push($listaCpf, $cpfMb);

    $msgErroMembros .= validarMembros($contador, $cpfMb, $nomeMb, $dnMb);
    $contador++;
}

// Verificando se foi inserido algum cpf repetido no formulário
$cpfDuplicado = array_count_values($listaCpf);
if ($cpfDuplicado >= 1) {
    foreach ($cpfDuplicado as $key => $value) {
        if ($value > 1) {
            $msgErroMembros .= $key . " (Há cpfs duplicados) ";
        }
    }
}

// se for passado o id da família, é porque ela já existe e, portanto, desja-se edita-la
if ($id_familia != "") { //atualizar

    // Validando os dados de entrada da Família
    // NÃO PERMITIR QUE O NOME SEJA EDITADO PARA UM QUE JÁ EXISTE NO BANCO
    // $msgErroFamilia = validarFamiliaUpdate($nomeFamilia, $email, $id_comunidade); //######

    if (empty($msgErroFamilia) && empty($msgErroMembros)) {
        // familiaDAO
        updateFamilia($conexao, $id_familia, $nomeFamilia, $email, $id_comunidade);

        $conexao = conectar();

        // Excluindo todos os possíveis membros já existentes para depois serem adicionados
        deleteMembros($conexao, $id_familia);

        $contador = 1;
        // Dados dos membros da família
        while ($contador <= $qtdMembros) {
            $nomeMb = $_POST["inputNomeMb" . $contador];
            $cpfMb = limparMascaraCpf($_POST["inputCpfMb" . $contador]);
            $dnMb = alterarOrdemDN($_POST["inputDNMb" . $contador]);
            $celMb = $_POST["inputCelMb" . $contador];

            // familiaDAO
            cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $id_familia);
            $contador++;
        }

        header("Location: ../visao/familias/index.php?cod=1&msg=Familia <b>$nomeFamilia ($id_familia)</b> atualizada com sucesso!");
    } else {
        // ERRO
        header("Location: ../visao/cad-fml/index.php?cod=0&msg=<b>Campos Inválidos:</b><br>$msgErroFamilia $msgErroMembros");

        // header("Location: ../visao/cad-fml/index.php?cod=0&msg=Campos Inválidos: $msgErroFamilia $msgErroMembros" . "&nomeFamilia=$nomeFamilia&email=$email&id_comunidade=$id_comunidade&qtd_membros=$qtd_membros" . $textMbHeader);
    }
} else { //cadastrar

    $msgErroFamilia = "";

    // Validando os dados de entrada da Família
    $msgErroFamilia .= validarNomeFamilia($nomeFamilia);
    $msgErroFamilia .= validarEmail($email);
    $msgErroFamilia .= validarIdComunidade($id_comunidade);

    if (empty($msgErroFamilia) && empty($msgErroMembros)) {
        $conexao = conectar();

        // familiaDAO
        // retorna o id da família que acabou de ser inserida, para que seus membros possam ser vinculados a ela
        $idFamilia = cadastrarFamilia($conexao, $nomeFamilia, $email, $id_comunidade);

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

        header("Location: ../visao/cad-fml/index.php?cod=1&msg=Familia <i><b>$nomeFamilia</b></i> cadastrada com sucesso!");
    } else {
        // ERRO
        header("Location: ../visao/cad-fml/index.php?cod=0&msg=Campos Inválidos: $msgErroFamilia $msgErroMembros" . "&nomeFamilia=$nomeFamilia&email=$email&id_comunidade=$id_comunidade&qtd_membros=$qtd_membros" . $textMbHeader);
    }
}
