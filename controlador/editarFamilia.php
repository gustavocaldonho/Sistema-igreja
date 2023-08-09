<?php

if (!empty($_GET['id_familia'])) {

    include_once '../dao/conexao.php';
    include_once '../dao/familiaDAO.php';

    $conexao = conectar();

    $id_familia = $_GET['id_familia']; // Id da família

    // pegando os dados da família com o referido id (familiaDAO)
    $result = getDadosFamilia($conexao, $id_familia);

    // pegando a quantidade de membros da família
    $resultQtd = getQtdMembrosFamilia($conexao, $id_familia);

    if ($result->num_rows > 0) {

        // Atribuindo os dados para as variáveis
        while ($user_data = mysqli_fetch_assoc($result)) {

            $nomeFamilia = $user_data['nome'];
            $email = $user_data['email'];
            $id_comunidade = $user_data['id_comunidade'];
        }

        while ($user_data = mysqli_fetch_assoc($resultQtd)) {
            $qtd_membros = $user_data['qtd'];
        }

        // echo $nomeFamilia ."<br>";
        // echo $email ."<br>";
        // echo $id_comunidade;

        // Retornando com GET para a página de edição do cadastro da família
        header("Location: ../visao/cad-fml/index.php?action=saveEditFamilia.php&id_familia=$id_familia&nomeFamilia=$nomeFamilia&email=$email&id_comunidade=$id_comunidade&qtd_membros=$qtd_membros");
    } else {
        // Caso ocorra alguma falha, a página de exibição das comunidades só será atualizada
        header("Location: ../visao/familias/index.php");
    }
} else {
    header("Location: ../visao/familias/index.php");
}
