<?php

function cadastrarPadroeiro($padroeiro, $localizacao, $cpfChefe)
{

    if (empty($msgErro)) {
        $conexao = conectar();

        // Cadastro da Comunidade (o Chefe da comunidade já deve estar cadastrado)
        $sqlComunidade = "INSERT INTO bd_sistema.comunidade (padroeiro, localizacao, chefe_conselho_cpf) VALUES ('$padroeiro', '$localizacao', '$cpfChefe')";
        mysqli_query($conexao, $sqlComunidade) or die(mysqli_error($conexao));

        // $id = mysqli_insert_id($conexao);
    } else {
        // ERRO
        // header("Location:../visao/formAgenda.php?msg=<b>Campos Inválidos:</b><br>$msgErro");
    }
}
