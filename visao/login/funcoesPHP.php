<?php

function getCodPerfil($resLogin)
{
    // Buscando o código de perfil do membro
    while ($user_data = mysqli_fetch_assoc($resLogin)) {
        $codPerfil = $user_data["perfil"];
    }

    return $codPerfil;
}

function getDadosMembro($resMembro)
{
    $array = array();

    // Buscando os dados do membro
    while ($user_data = mysqli_fetch_assoc($resMembro)) {
        // $nome = $user_data["nome"];
        // $data_nasc = $user_data["data_nasc"];
        // $celular = $user_data["celular"];
        // $id_familia = $user_data["id_familia"];

        array_push($array, $user_data["nome"]);
        array_push($array, $user_data["data_nasc"]);
        array_push($array, $user_data["celular"]);
        array_push($array, $user_data["id_familia"]);
    }

    return $array;
}
