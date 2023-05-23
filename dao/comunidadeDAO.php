<?php 

require_once '../dao/conexao.php';
// require_once '../controlador/funcoesUteis.php';

$chefeConselho = $_POST["inputNomeChefe"];
$cpfChefe = $_POST["inputCpfChefe"];
// $emailChefe = $_POST["inputEmail"];
// $celChefe = $_POST["inputCel"];
// $padroeiro = $_POST["inputPadroeiro"];
// $localizacao = $_POST["inputLocalização"];
// $nomeMb1 = $_POST["inputNomeMb1"];
// $nomeMb2 = $_POST["inputNomeMb2"];
// $nomeMb3 = $_POST["inputNomeMb3"];
// $cpfMb1 = $_POST["inputCpfMb1"];
// $cpfMb2 = $_POST["inputCpfMb2"];
// $cpfMb3 = $_POST["inputCpfMb3"];
// $celMb1 = $_POST["inputCelMb1"];
// $celMb2 = $_POST["inputCelMb2"];
// $celMb3 = $_POST["inputCelMb3"];

// echo $idMedico ."</br>";
// echo $nomePaciente ."</br>";
// echo $email ."</br>";
// echo $telefone ."</br>";
// echo $data ."</br>";
// echo $hora ."</br>";

echo $chefeConselho . "</br>";
// $cpfChefe = $_POST["inputCpf"];
// $emailChefe = $_POST["inputEmail"];
// $celChefe = $_POST["inputCel"];
// $padroeiro = $_POST["inputPadroeiro"];
// $localizacao = $_POST["inputLocalização"];
// $nomeMb1 = $_POST["inputNomeMb1"];
// $nomeMb2 = $_POST["inputNomeMb2"];
// $nomeMb3 = $_POST["inputNomeMb3"];
// $cpfMb1 = $_POST["inputCpfMb1"];
// $cpfMb2 = $_POST["inputCpfMb2"];
// $cpfMb3 = $_POST["inputCpfMb3"];
// $celMb1 = $_POST["inputCelMb1"];
// $celMb2 = $_POST["inputCelMb2"];
// $celMb3 = $_POST["inputCelMb3"];


// Validando os dados:
//$msgErro = validarCampos($idMedico, $nomePaciente, $email, $telefone, $data, $hora);

// if(empty($msgErro)){
//     $conexao = conectar();

//     $sql = "INSERT INTO 2020_M10_agenda_medica.agenda (nomePaciente, email, telefone, dtConsulta, horaConsulta, idMedico) VALUES ('$nomePaciente', '$email', '$telefone', '$data', '$hora', '$idMedico')";

//     mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
//     $id = mysqli_insert_id($conexao);

//     header("Location:../visao/formAgenda.php?msg=Agendamento de $nomePaciente inserido com sucesso.");

// } else {
//     // ERRO
//     header("Location:../visao/formAgenda.php?msg=<b>Campos Inválidos:</b><br>$msgErro");
// }

?>