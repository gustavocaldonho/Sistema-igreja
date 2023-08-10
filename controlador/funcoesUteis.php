<?php

include_once '../dao/familiaDAO.php';
include_once '../dao/conexao.php';

function validarMembros($contador, $cpfMb, $nomeMb, $dnMb)
{
    $msgErroMembros = "";

    // verifica se o cpf é válido
    if (validarCPF($cpfMb) == false) {
        $msgErroMembros .= "cpfMb" . $contador . "<br>";
    } else {
        // o cpf é verdadeiro e precisa ser verificado se já existe no banco de dados
        $conexao = conectar();
        $assoc = cpfDuplicado($conexao, $cpfMb); //familiaDAO

        while ($user_data = $assoc) {
            $qtd = $user_data["qtd"];
            // 0 = false, 1 = true (cpf já existe);
            if ($qtd == 1) {
                $msgErroMembros .= "cpfMb" . $contador . " já cadastrado <br>";
            }
            break;
        }
    }

    if (empty($nomeMb)) {
        $msgErroMembros .= "nomeMb" . $contador . "<br>";
    }

    // false = "", true = 1
    if (empty(validarDataNascimento($dnMb))) {
        $msgErroMembros .= "dnMb" . $contador . "<br>";
    }

    return $msgErroMembros;
}

function validarFamilia($nomeFamilia, $email, $idComunidade)
{
    $msgErro = "";

    if (empty($nomeFamilia)) {
        $msgErro .= "NomeFamilia <br>";
    }

    if (empty($email)) {
        $msgErro .= "email <br>";
    } else {
        // Tem '@' e '.com'?
        if ((str_contains($email, '@')) && (str_contains($email, '.com'))) {
            // Faça nada
        } else {
            // Se não tem, envia a msg de erro
            $msgErro .= "email <br>";
        }
    }

    if (empty($idComunidade)) {
        $msgErro .= "idComunidade <br>";
    }

    return $msgErro;
}

function validarPadroeiro($padroeiro)
{
    $msgErro = "";

    if (empty($padroeiro)) {
        $msgErro .= " (Padroeiro) ";
    } else {
        // verificando se o padroeiro já foi cadastrado no banco anteriormente
        $conexao = conectar();
        $assoc = padroeiroDuplicado($conexao, $padroeiro); //comunidadeDAO

        if ($assoc) {
            $msgErro .= "Comunidade <u>" . $padroeiro . "</u> já cadastrado(a)!";
        }
    }

    return $msgErro;
}

function validarPadroeiroUpdate($padroeiro, $id_comunidade)
{
    $msgErro = "";

    if (empty($padroeiro)) {
        $msgErro .= " (Padroeiro) ";
    } else {
        $conexao = conectar();

        // verificando se o padroeiro já foi cadastrado no banco anteriormente (retorna true ou false)
        $assocPadroeiro = padroeiroDuplicado($conexao, $padroeiro); //comunidadeDAO

        // Verificando se o nome do padroeiro está vinculado a mesma comunidade que se dejesa atualizar
        $assocCom = existeIdComunidade($conexao, $padroeiro, $id_comunidade); //comunidadeDAO

        if ($assocPadroeiro) { //true (padroeiro já existe no banco)
            // padroeiro já cadastrado e mesmo id_comunidade { atualiza }
            if ($assocCom) { //true (padroeiro está vinculado a mesma comunidade)
                // atualizar os dados
            } else {
                // inseriu o padroeiro no cadastro, mas ele já está vinculado a outra comunidade
                $msgErro .= "Comunidade <u>" . $padroeiro . "</u> já cadastrado(a)!";
            }
        }
    }

    return $msgErro;
}

function validarLocalizacao($localizacao)
{
    $msgErro = "";

    if (empty($localizacao)) {
        $msgErro .= " (Localizacao) ";
    }

    return $msgErro;
}

function validarEmail($email)
{
    $msgErro = "";

    if (empty($email)) {
        $msgErro .= " (Email) ";
    } else {
        if (!(str_contains($email, '@')) || !(str_contains($email, '.com'))) {
            $msgErro .= " (Email) ";
        }
    }

    return $msgErro;
}

function validarEvento($titulo, $descricao, $data, $horario, $local, $presidente)
{
    $msgErro = "";

    if (empty($titulo)) {
        $msgErro .= "tituloErro ";
    }

    if (empty($descricao)) {
        $msgErro .= " descricaoErro ";
    }

    if (empty($data)) {
        $msgErro .= " dataErro ";
    }

    if (empty($horario)) {
        $msgErro .= " horarioErro ";
    }

    if (empty($local)) {
        $msgErro .= " localErro ";
    }

    if (empty($presidente)) {
        $msgErro .= " presidenteErro";
    }

    return $msgErro;
}

function validarAviso($titulo, $descricao)
{
    $msgErro = "";

    if (empty($titulo)) {
        $msgErro .= "tituloErro ";
    }

    if (empty($descricao)) {
        $msgErro .= "descricaoErro";
    }

    return $msgErro;
}

function validarCPF($cpf)
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

function validarDataNascimento($dn)
{
    // se a data não for preenchida completamente, já acusará o erro aqui
    if (strlen($dn) != 10) {
        return false;
    }

    $data = explode("/", "$dn"); // fatia a string $dn em pedados, usando / como referência

    $d = $data[0]; //dia
    $m = $data[1]; //mes
    $y = $data[2]; //ano

    // verifica se a data é válida!
    // 1 = true (válida)
    // 0 = false (inválida)
    $res = checkdate($m, $d, $y);
    if ($res == 1) {
        return true;
    } else {
        return false;
    }
}

function limparMascaraCpf($cpf)
{
    if (empty($cpf)) {
        return 0;
    } else {
        $cpfLimpo = preg_replace('/[^0-9]/is', '', $cpf);
        return $cpfLimpo;
    }
}

function devolverMascaraCpf($cpf)
{
    // se o cpf começar com zero(s), esse(s) zero(s) não são salvos no bd (005.443.333-34 é salvo como 544333334)
    if (strlen($cpf) < 11) {

        // quantidade de zeros que faltam
        $zeros = 11 - strlen($cpf);

        $stringZeros = ""; // string de zeros

        $c = 0; //contador
        while ($c < $zeros) {
            $stringZeros .= "0";
            $c++;
        }

        // acrescentando a quantidade de zeros que faltam
        $cpf = $stringZeros . $cpf;
    }

    $novoCpf = $cpf[0] . $cpf[1] . $cpf[2] . "." . $cpf[3] . $cpf[4] . $cpf[5] . "." . $cpf[6] . $cpf[7] . $cpf[8] . "-" . $cpf[9] . $cpf[10];

    return $novoCpf;
}


// Função apara deixar a data de nascimento no padrão aceitável pelo bd
function alterarOrdemDN($data_nasc)
{
    if (empty($data_nasc)) {
        return 0;
    } else {
        $lista = explode("/", $data_nasc);

        $dia = $lista[0];
        $mes = $lista[1];
        $ano = $lista[2];

        $novaDN = $ano . "-" . "$mes" . "-" . $dia;

        return $novaDN;
    }
}

// altera o padrão de data dos eua para o brasileiro (aaaa-mm-dd -> dd/mm/aaaa) 
function ordemBrDN($data_nasc)
{
    if (empty($data_nasc)) {
        return 0;
    } else {
        $lista = explode("-", $data_nasc);

        $dia = $lista[2];
        $mes = $lista[1];
        $ano = $lista[0];

        $novaDN = $dia . "/" . "$mes" . "/" . $ano;

        return $novaDN;
    }
}
