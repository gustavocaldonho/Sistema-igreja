<?php

include_once("../dao/familiaDAO.php");
include_once("../dao/conexao.php");

function validarMembros($contador, $id_familia, $cpfMb, $nomeMb, $dnMb)
{
    $msgErroMembros = "";

    // verifica se o cpf é válido
    if (validarCPF($cpfMb) == false) {
        $msgErroMembros .= " (cpf $contador" . "º membro) ";
    } else {
        // o cpf é verdadeiro e precisa ser verificado se já existe no banco de dados
        $conexao = conectar();
        $assoc = cpfDuplicado($conexao, $cpfMb); //familiaDAO

        while ($user_data = $assoc) {
            $cpf = $user_data["cpf"];
            $id_Bd = $user_data["id_familia"]; // id fa família que está no bd

            // se o cpf do membro já estiver no banco e o id da família a qual ele está vinculado é diferente do id que vem como parâmetro, é porque o cpf já está vinculado a outra família (se fosse igual, quer dizer que está ocorrendo uma atualização da família)
            if (!empty($cpf) && $id_familia != $id_Bd) {
                $msgErroMembros .= " (cpf $cpfMb já está vinculado a outra família) ";
            }
            break;
        }
    }

    if (empty($nomeMb)) {
        $msgErroMembros .= " (nome $contador" . "º membro) ";
    }

    // false = "", true = 1
    if (empty(validarDataNascimento($dnMb))) {
        $msgErroMembros .= " (Data de Nascimento $contador" . "º membro) ";
    }

    return $msgErroMembros;
}

function validarNomeFamilia($nomeFamilia)
{
    $msgErro = "";

    if (empty($nomeFamilia)) {
        $msgErro .= " (Nome da Familia) ";
    } else {
        // verificando se o nome da família já foi cadastrado no banco anteriormente
        $conexao = conectar();
        $assoc = FamiliaDuplicada($conexao, $nomeFamilia); //familiaDAO

        if ($assoc) {
            $msgErro .= "Família <i><b>" . $nomeFamilia . "</b></i> já cadastrada!";
        }
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
            $msgErro .= "Comunidade <i><b>" . $padroeiro . "</b></i> já cadastrada!";
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
            // Se padroeiro já cadastrado e mesmo id_comunidade { atualiza }
            if ($assocCom) { //true (padroeiro está vinculado a mesma comunidade)
                // atualizar os dados
            } else {
                // inseriu o padroeiro no cadastro, mas ele já está vinculado a outra comunidade
                $msgErro .= "Comunidade <u>" . $padroeiro . "</u> já cadastrada!";
            }
        }
    }

    return $msgErro;
}

function validarNomeFamiliaUpdate($nomeFamilia, $id_familia)
{
    $msgErro = "";

    if (empty($nomeFamilia)) {
        $msgErro .= " (nome da familia) ";
    } else {
        $conexao = conectar();

        // verificando se a família já foi cadastrada no banco anteriormente (retorna true ou false)
        $assocFamilia = familiaDuplicada($conexao, $nomeFamilia); //comunidadeDAO

        // Verificando se o nome da família está vinculada a mesma família (id) que se dejesa atualizar
        $assocFam = existeIdFamilia($conexao, $nomeFamilia, $id_familia); //familiaDAO

        if ($assocFamilia) { //true (nome já existe no banco)
            // Se nome já cadastrado e mesmo id_família { atualiza }
            if ($assocFam) { //true (nome está vinculado a mesma família)
                // atualizar os dados
            } else {
                // inseriu o nome no cadastro, mas ele já está vinculado a outra família
                $msgErro .= "Família <u>" . $nomeFamilia . "</u> já cadastrada!";
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

function validarIdComunidade($id_comunidade)
{
    $msgErro = "";

    if (empty($id_comunidade)) {
        $msgErro .= " (Comunidade) ";
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
