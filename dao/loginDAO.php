<?php 

function getDadosLogin($conexao, $cpf){
    $sql = "SELECT * FROM bd_sistema.login WHERE membro_familia_cpf = $cpf";

    $result = mysqli_query($conexao, $sql);

    return $result;
}

function getDadosMembrosFamiliaLogin($conexao, $cpf)
{
    $sqlSelect = "SELECT * FROM bd_sistema.membro_familia WHERE cpf = $cpf";

    $resultSelect = $conexao->query($sqlSelect);

    return $resultSelect;
}
