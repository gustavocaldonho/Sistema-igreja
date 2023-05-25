<?php

function cadastrarChefe($cpfChefe, $nomeChefe, $emailChefe, $celChefe)
{
    if (empty($msgErro)) {
        $conexao = conectar();

        // Cadastro do Chefe do Conselho
        $sqlChefe = "INSERT INTO bd_sistema.chefe_conselho (cpf, nome, email, celular) VALUES ('$cpfChefe', '$nomeChefe', '$emailChefe', '$celChefe')";
        mysqli_query($conexao, $sqlChefe) or die (mysqli_error($conexao));
        // Inserir no banco os seus dados de login (senha padrao-cpf)

        // $id = mysqli_insert_id($conexao);
    } else {
        // ERRO
        // header("Location:../visao/formAgenda.php?msg=<b>Campos Inválidos:</b><br>$msgErro");
    }
}
