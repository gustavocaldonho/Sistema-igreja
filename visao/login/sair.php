<?php 

session_start();
unset($_SESSION["cpf"]);
unset($_SESSION["senha"]);
unset($_SESSION["codPerfil"]);
unset($_SESSION["id_familia"]);
unset($_SESSION["id_comunidade"]);
header("Location: index.php");

?>