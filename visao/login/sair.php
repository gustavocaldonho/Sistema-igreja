<?php

session_start();
session_unset(); // apagando todas as variáveis da sessão
session_destroy();

// voltando para a página de login
header("Location: index.php");
