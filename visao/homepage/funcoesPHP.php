<?php 

function getMes($mes)
{
    if ($mes == 1) {
        return "janeiro";
    }
    if ($mes == 2) {
        return "fevereiro";
    }
    if ($mes == 3) {
        return "março";
    }
    if ($mes == 4) {
        return "abril";
    }
    if ($mes == 5) {
        return "maio";
    }
    if ($mes == 6) {
        return "junho";
    }
    if ($mes == 7) {
        return "julho";
    }
    if ($mes == 8) {
        return "agosto";
    }
    if ($mes == 9) {
        return "setembro";
    }
    if ($mes == 10) {
        return "outubro";
    }
    if ($mes == 11) {
        return "novembro";
    }
    if ($mes == 12) {
        return "dezembro";
    }
}

function getDiaSemana($data_evento){
    // Array com os dias da semana
    $diasemana = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');

    // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
    $diasemana_numero = date('w', strtotime($data_evento));

    // Exibe o dia da semana com o Array
    return $diasemana[$diasemana_numero];
}

?>

