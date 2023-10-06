<?php

function getCodPerfil($resLogin)
{
    while ($user_data = mysqli_fetch_assoc($resLogin)) {
        $codPerfil = $user_data["perfil"];
    }

    return $codPerfil;
}

function getDadosMembroLogado($resMembro)
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


function getDadosFamiliaPerfil($resFamilia)
{
    $array = array();

    while ($user_data = mysqli_fetch_assoc($resFamilia)) {
        array_push($array, $user_data["nome"]);
        array_push($array, $user_data["email"]);
        array_push($array, $user_data["id_comunidade"]);
        array_push($array, $user_data["ativo"]);
    }

    return $array;
}

function getDadosComunidadePerfil($resComunidade)
{
    $array = array();

    while ($user_data = mysqli_fetch_assoc($resComunidade)) {
        array_push($array, $user_data["padroeiro"]);
        array_push($array, $user_data["localizacao"]);
        array_push($array, $user_data["email"]);
    }

    return $array;
}