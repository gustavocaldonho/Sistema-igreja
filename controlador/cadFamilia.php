<?php

require_once '../dao/familiaDAO.php';
require_once '../dao/loginDAO.php';
require_once '../dao/conexao.php';
require_once '../controlador/funcoesUteis.php';

var_dump($_POST);
// return;

// Dados da família
$nomeFamilia = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$id_comunidade = $_POST["listaComunidades"];
$qtd_membros = $_POST["controleCampos"];
$id_familia = $_POST['input_id_familia']; // se for primeiro cadastro, a família ainda não possui id (id = ""), se for edição, ela já possuirá um id
$listaComIdMembros = explode(",", $_POST["idsCampos"]);

// Validando os dados de entrada dos membros
$listaCpf = array(); // lista dos Cpfs dos membros
$msgErroMembros = "";
$textMbHeader = "";
$contador = 0;
// while ($contador <= $qtd_membros) {
while ($contador <= $qtd_membros - 1) {
    $nomeMb = $_POST["inputNomeMb" . $listaComIdMembros[$contador]];
    $cpfMb = $_POST["inputCpfMb" . $listaComIdMembros[$contador]];
    $dnMb = $_POST["inputDNMb" . $listaComIdMembros[$contador]];
    $celMb = $_POST["inputCelMb" . $listaComIdMembros[$contador]]; // não é obrigatório possuir

    // Caso ocorra algum erro, os dados são guardados para serem devolvidos a página de cadastro
    $textMbHeader .= "&cpfMb" . $listaComIdMembros[$contador] . "=$cpfMb" . "&nomeMb" . $listaComIdMembros[$contador] . "=$nomeMb" . "&dnMb" . $listaComIdMembros[$contador] . "=$dnMb" . "&celMb" . $listaComIdMembros[$contador] . "=$celMb";

    // inserindo os cpfs numa lista, a fim de verificar se tem algum duplicado
    array_push($listaCpf, $cpfMb);

    $msgErroMembros .= validarMembros($listaComIdMembros[$contador], $id_familia, $cpfMb, $nomeMb, $dnMb);
    $contador++;
}

// echo "<br><br>" . $textMbHeader . "<br>" . $qtd_membros . "<br>";
// return;

// Verificando se foi inserido algum cpf repetido no formulário
$cpfDuplicado = array_count_values($listaCpf);
if ($cpfDuplicado >= 1) {
    foreach ($cpfDuplicado as $key => $value) {
        if ($value > 1 && $key != "") {
            $msgErroMembros .= " (o cpf $key está repetido) ";
        }
    }
}

// se for passado o id da família, é porque ela já existe e, portanto, desja-se edita-la
if ($id_familia != "") { //atualizar

    // Validando os dados de entrada da Família
    $msgErroFamilia = "";
    $msgErroFamilia .= validarEmail($email);
    $msgErroFamilia .= validarIdComunidade($id_comunidade);
    $msgErroFamilia .= validarNomeFamiliaUpdate($nomeFamilia, $id_familia);

    // echo $msgErroFamilia;

    if (empty($msgErroFamilia) && empty($msgErroMembros)) {
        $conexao = conectar();

        // familiaDAO
        updateFamilia($conexao, $id_familia, $nomeFamilia, $email, $id_comunidade);

        // Excluindo todos os possíveis membros já existentes para depois serem adicionados
        // Os logins são deletados automaticamente, de acordo com a especificação 'cascade' na tabela
        deleteMembros($conexao, $id_familia);

        $contador = 1;
        // Dados dos membros da família
        while ($contador <= $qtd_membros) {
            $nomeMb = $_POST["inputNomeMb" . $contador];
            $cpfMb = limparMascaraCpf($_POST["inputCpfMb" . $contador]);
            $dnMb = alterarOrdemDN($_POST["inputDNMb" . $contador]);
            $celMb = $_POST["inputCelMb" . $contador];

            // familiaDAO
            cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $id_familia);
            $contador++;

            // loginDAO
            cadastrarLogin($conexao, $cpfMb); // todos os membros são inseridos com o perfil padrão de '0'
        }

        header("Location: ../visao/perfil-fml/index.php?id_familia=$id_familia&cod=1&msg=Familia <b>$nomeFamilia ($id_familia)</b> atualizada com sucesso!");

        // header("Location: ../visao/familias/index.php?cod=1&msg=Familia <b>$nomeFamilia ($id_familia)</b> atualizada com sucesso!");
    } else {
        // ERRO
        header("Location: ../visao/cad-fml/index.php?cod=0&msg=Campos Inválidos: $msgErroFamilia $msgErroMembros" . "&nomeFamilia=$nomeFamilia&email=$email&id_comunidade=$id_comunidade&id_familia=$id_familia&qtd_membros=$qtd_membros" . $textMbHeader);
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
        while ($contador <= $qtd_membros) {
            $nomeMb = $_POST["inputNomeMb" . $contador];
            $cpfMb = limparMascaraCpf($_POST["inputCpfMb" . $contador]);
            $dnMb = alterarOrdemDN($_POST["inputDNMb" . $contador]);
            $celMb = $_POST["inputCelMb" . $contador];

            // familiaDAO
            cadastrarMembro($conexao, $cpfMb, $nomeMb, $dnMb, $celMb, $idFamilia);
            $contador++;

            // loginDAO
            cadastrarLogin($conexao, $cpfMb); // todos os membros são inseridos com o perfil padrão de '0'
        }

        header("Location: ../visao/cad-fml/index.php?cod=1&msg=Familia <i><b>$nomeFamilia</b></i> cadastrada com sucesso!");
    } else {
        // ERRO
        header("Location: ../visao/cad-fml/index.php?cod=0&msg=Campos Inválidos: $msgErroFamilia $msgErroMembros" . "&nomeFamilia=$nomeFamilia&email=$email&id_comunidade=$id_comunidade&qtd_membros=$qtd_membros" . $textMbHeader);
    }
}
