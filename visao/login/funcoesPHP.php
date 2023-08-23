<?php

function getCodPerfil($resLogin)
{
    while ($user_data = mysqli_fetch_assoc($resLogin)) {
        $codPerfil = $user_data["perfil"];
    }

    return $codPerfil;
}

function getDadosMembro($resMembro)
{
    $array = array();

    while ($user_data = mysqli_fetch_assoc($resMembro)) {
        array_push($array, $user_data["nome"]);
        array_push($array, $user_data["data_nasc"]);
        array_push($array, $user_data["celular"]);
        array_push($array, $user_data["id_familia"]);
    }

    return $array;
}
