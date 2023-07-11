<?php

function validarCampos($nomeChefe, $cpfChefe, $emailChefe, $celChefe, $padroeiro, $localizacao, $nomeMb1, $nomeMb2, $nomeMb3, $cpfMb1, $cpfMb2, $cpfMb3, $celMb1, $celMb2, $celMb3)
{
    $msgErro = "";

    // ####################################################################################################
    // Verificando os campos de nomes e localização
    // ####################################################################################################

    if (empty($nomeChefe)) {
        $msgErro .= "NomeChefe ";
    }

    if (empty($padroeiro)) {
        $msgErro .= "Padroeiro ";
    }

    if (empty($localizacao)) {
        $msgErro .= "Localizacao ";
    }

    if (empty($nomeMb1)) {
        $msgErro .= "nomeMb1 ";
    }

    if (empty($nomeMb2)) {
        $msgErro .= "nomeMb2 ";
    }

    if (empty($nomeMb3)) {
        $msgErro .= "nomeMb3 ";
    }

    // ####################################################################################################
    // Verificando o campo email
    // ####################################################################################################

    if (empty($emailChefe)) {
        $msgErro .= "emailChefe ";
    } else {
        if ((str_contains($emailChefe, '@')) && (str_contains($emailChefe, '.com'))) {
            // Faça nada
        } else {
            $msgErro .= "emailChefe";
        }
    }

    // ####################################################################################################
    // Verificando os campos de celulares
    // ####################################################################################################

    if (strlen($celChefe) < 15) {
        $msgErro .= "celChefe" . "(" . strlen($celChefe) .  ") ";
    }

    if (strlen($celMb1) < 15) {
        $msgErro .= "celMb1" . "(" . strlen($celMb1) .  ") ";
    }

    if (strlen($celMb2) < 15) {
        $msgErro .= "celMb2" . "(" . strlen($celMb2) .  ") ";
    }

    if (strlen($celMb3) < 15) {
        $msgErro .= "celMb3" . "(" . strlen($celMb3) .  ") ";
    }

    // ####################################################################################################
    // Verificando os CPFs
    // ####################################################################################################

    if (validaCPF($cpfChefe)) {
        // CPF válido
    } else {
        $msgErro .= "cpfChefe ";
    }

    if (validaCPF($cpfMb1)) {
        // CPF válido
    } else {
        $msgErro .= "cpfMb1 ";
    }

    if (validaCPF($cpfMb2)) {
        // CPF válido
    } else {
        $msgErro .= "cpfMb2 ";
    }

    if (validaCPF($cpfMb3)) {
        // CPF válido
    } else {
        $msgErro .= "cpfMb3 ";
    }

    return $msgErro;
}

function validarComunidade($padroeiro, $localizacao, $email)
{
    $msgErro = "";

    if (empty($padroeiro)) {
        $msgErro .= "Padroeiro<br>";
    }

    if (empty($localizacao)) {
        $msgErro .= "Localizacao<br>";
    }

    if (empty($email)) {
        $msgErro .= "email<br>";
    } else {
        if ((str_contains($email, '@')) && (str_contains($email, '.com'))) {
            // Faça nada
        } else {
            $msgErro .= "email<br>";
        }
    }

    return $msgErro;
}

function validaCPF($cpf)
{

    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function limparMascaraCpf($cpf){
    $cpfLimpo = preg_replace('/[^0-9]/is', '', $cpf);

    return $cpfLimpo;
}


// Função apara deixar a data de nascimento no padrão aceitável pelo bd
function alterarOrdemDN($data_nasc){
    $lista = explode("/", $data_nasc);

    $dia = $lista[0];
    $mes = $lista[1];
    $ano = $lista[2];

    $novaDN = $ano."-"."$mes"."-".$dia;

    return $novaDN;    
}