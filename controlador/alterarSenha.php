<?php

include_once("../dao/conexao.php");
include_once("../dao/membroFamiliaDAO.php");

// var_dump($_POST);

$cpf = $_POST["cpf_membro"];
$senhaAtual = $_POST["senhaAtual"];
$novaSenha = $_POST["novaSenha"];
$novaSenhaConfirmacao = $_POST["novaSenhaConfirmacao"];


// verificando se os campos foram preenchidos
if ($senhaAtual != "" && $novaSenha != "" && $novaSenhaConfirmacao != "") {

    $conexao = conectar();

    // verificando se a senha atual está correta
    $result = verificarSenha($conexao, $senhaAtual, $cpf);

    // retorna a quantidade de linhas
    while ($user_data = mysqli_fetch_assoc($result)) {
        $qtd_linha = $user_data["qtd_linha"];
    }

    // alterando no banco
    if (($qtd_linha == 1) && ($novaSenha == $novaSenhaConfirmacao)) {
        alterarSenha($conexao, $novaSenha, $cpf);
        header("Location: ../visao/perfil-fml?msg=Senha alterada com sucesso!");
    } else {
        header("Location: ../visao/perfil-fml?msg=Digite sua senha atual corretamente!");
    }
} else {
    header("Location: ../visao/perfil-fml?msg=Campos inválidos!");
}
