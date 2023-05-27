<?php

function cadastrarMembros($conexao, $idComunidade, $cpfMb1, $cpfMb2, $cpfMb3, $nomeMb1, $nomeMb2, $nomeMb3, $celMb1, $celMb2, $celMb3)
{
        // Cadastro dos Membros do Conselho da Comunidade

        // ####################################################################################
        // ***** Código para pegar o id da comunidade de acordo com o cpf do chefe do conselho
        // ####################################################################################

        // Membro 1
        $sqlMb1 = "INSERT INTO bd_sistema.membro_conselho (cpf, nome, celular, idcomunidade) VALUES ('$cpfMb1', '$nomeMb1', '$celMb1', '$idComunidade')";
        mysqli_query($conexao, $sqlMb1) or die(mysqli_error($conexao));

        // Membro 2
        $sqlMb2 = "INSERT INTO bd_sistema.membro_conselho (cpf, nome, celular, idcomunidade) VALUES ('$cpfMb2', '$nomeMb2', '$celMb2', '$idComunidade')";
        mysqli_query($conexao, $sqlMb2) or die(mysqli_error($conexao));

        // Membro 3
        $sqlMb3 = "INSERT INTO bd_sistema.membro_conselho (cpf, nome, celular, idcomunidade) VALUES ('$cpfMb3', '$nomeMb3', '$celMb3', '$idComunidade')";
        mysqli_query($conexao, $sqlMb3) or die(mysqli_error($conexao));

        // $id = mysqli_insert_id($conexao);
}
