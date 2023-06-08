<?php

function editarComunidade($id)
{

}

if (!empty($_GET['id'])) {

    include_once '../dao/conexao.php';
    include_once '../dao/comunidadeDAO.php';

    $conexao = conectar();

    $id = $_GET['id']; // Id da comunidade

    // pegando os dados da comunidade com o referido id
    $result = editComunidade($conexao, $id);

    if ($result->num_rows > 0) {

        // Atribuindo os dados para as variáveis
        while ($user_data = mysqli_fetch_assoc($result)) {

            $padroeiro = $user_data['padroeiro'];
            $localizacao = $user_data['localizacao'];
            $email = $user_data['email'];
        }

        // echo $padroeiro ."<br>";
        // echo $localizacao ."<br>";
        // echo $email;

        // Retornando com GET para a página de edição do cadastro da comunidade
        header("Location: ../visao/cad-com/edit.php?msg=&id_comunidade=$id&padroeiro=$padroeiro&localizacao=$localizacao&email=$email");

        // print_r($nome);
    } else {
        // Caso ocorra alguma falha, a página de exibição das comunidades só será atualizada
        header("Location: ../visao/comunidades/index.php");
    }
} else {
    header("Location: ../visao/comunidades/index.php");
}
