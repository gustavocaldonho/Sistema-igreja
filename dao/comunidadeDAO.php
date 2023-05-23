<?php 

require_once '../dao/conexao.php';
// require_once '../controlador/funcoesUteis.php';

$nomeChefe = $_POST["inputNomeChefe"];
$cpfChefe = $_POST["inputCpf"];
$emailChefe = $_POST["inputEmail"];
$celChefe = $_POST["inputCel"];
$padroeiro = $_POST["inputPadroeiro"];
$localizacao = $_POST["inputLocalização"];
$nomeMb1 = $_POST["inputNomeMb1"];
$nomeMb2 = $_POST["inputNomeMb2"];
$nomeMb3 = $_POST["inputNomeMb3"];
$cpfMb1 = $_POST["inputCpfMb1"];
$cpfMb2 = $_POST["inputCpfMb2"];
$cpfMb3 = $_POST["inputCpfMb3"];
$celMb1 = $_POST["inputCelMb1"];
$celMb2 = $_POST["inputCelMb2"];
$celMb3 = $_POST["inputCelMb3"];

// echo $chefeConselho . "</br>";
// echo $cpfChefe . "</br>";
// echo $emailChefe . "</br>";
// echo $celChefe . "</br>";
// echo $padroeiro . "</br>";
// echo $localizacao . "</br>";
// echo $nomeMb1 . "</br>";
// echo $nomeMb2 . "</br>";
// echo $nomeMb3 . "</br>";
// echo $cpfMb1 . "</br>";
// echo $cpfMb2 . "</br>";
// echo $cpfMb3 . "</br>";
// echo $celMb1 . "</br>";
// echo $celMb2 . "</br>";
// echo $celMb3 . "</br>";


// Validando os dados:
// $msgErro = validarCampos($idMedico, $nomePaciente, $email, $telefone, $data, $hora);
$msgErro = "";

if(empty($msgErro)){
    $conexao = conectar();

    // $sql = "INSERT INTO 'bd-igreja'.'chefe-conselho' (cpf, nome, email, celular) VALUES ('$cpfChefe', '$nomeChefe', '$emailChefe', '$celChefe')";

    $sql = "INSERT INTO bd_sistema.chefe_conselho (cpf, nome, email, celular) VALUES ('$cpfChefe', '$nomeChefe', '$emailChefe', '$celChefe')";

    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    // $id = mysqli_insert_id($conexao);

    // header("Location:../visao/formAgenda.php?msg=Agendamento de $nomePaciente inserido com sucesso.");

} else {
    // ERRO
    header("Location:../visao/formAgenda.php?msg=<b>Campos Inválidos:</b><br>$msgErro");
}

?>