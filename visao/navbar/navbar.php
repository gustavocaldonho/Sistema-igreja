<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Se o link abaixo for descomentado, a navbar nas outras páginas perde a formatação -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style-navbar.css">
    <title>Dropdown menu</title>
</head>

<body>

    <?php

    session_start();
    // print_r($_SESSION);

    if ((!isset($_SESSION["cpf"]) == true) and (!isset($_SESSION["senha"]) == true)) {

        unset($_SESSION["cpf"]);
        unset($_SESSION["senha"]);
        header("Location: ../login/index.php");
    } else {

        include_once("../../dao/conexao.php");
        include_once("../../dao/familiaDAO.php");
        include_once("../../dao/loginDAO.php");
        include_once("../login/funcoesPHP.php");

        $conexao = conectar();
        $resLogin = getDadosLogin($conexao, $_SESSION["cpf"]); // loginDAO
        $resMembro = getDadosMembrosFamiliaLogin($conexao, $_SESSION["cpf"]); // loginDAO

        // Buscando o código de perfil do membro
        $codPerfil = getCodPerfil($resLogin); // login/funcoesPHP

        // Buscando os dados do membro
        $arrayDados = getDadosMembro($resMembro); // login/funcoesPHP

        // $logado = $_SESSION["cpf"];
    }

    ?>

    <nav>
        <div class="box__navbar">
            <ul id="ul-left">
                <li>
                    <a class="link-dgapy" href="">Dgapy</a>
                </li>
                <li>
                    <a href="../homepage/">Página Inicial</a>
                </li>

                <?php
                if ($codPerfil == 2) {
                    echo "<li class='dropdown'>
                            <a href='../comunidades/'>Comunidades</a>
                         </li>";
                }
                ?>

                <?php
                if ($codPerfil == 1 || $codPerfil == 2) {
                    echo "<li class='dropdown'>
                            <a href='../familias/'>Famílias</a>
                        </li>";
                }
                ?>

                <li>
                    <a href="../dizimo/">Dízimo</a>
                </li>
                <li>
                    <a href="../caixa-mortuario/">Caixa Mortuário</a>
                </li>

                <!---------------------------- campo teste --------------------------------->
                <li>
                    <a href=""><?php echo "#$codPerfil ";
                                echo "$arrayDados[1] - $arrayDados[2] - $arrayDados[3]"
                                ?></a>
                </li>
                <!-------------------------------------------------------------------------->

            </ul>

            <!-- Canto direito -> aba de notificações e de login -->
            <ul id="ul-right">
                <li class="dropdown">
                    <a href="">
                        <!-- Sininho das notificações -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg>
                    </a>
                    <!-- O alinhamento a esquerda foi feito por meio da classe drop-notificacao, usando margin-left (negativo) -->
                    <div class="dropdown-menu drop-notificacao">
                        <p><b>Title Lorem, ipsum.</b><br> Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        <div class="dropdown-divider"></div>
                        <p><b>Title Lorem, ipsum.</b><br>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laboriosam, eligendi!</p>
                        <div class="dropdown-divider"></div>
                        <p><b>Title Lorem, ipsum.</b><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Cumque aliquid voluptatibus nulla
                            nesciunt dolores porro! Neque magni incidunt facilis illum!</p>
                    </div>
                </li>

                <li>
                    <a href="../perfil-fml/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill mb-1" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg> <?php echo $arrayDados[0] ?>
                    </a>
                </li>

                <li>
                    <a href="../login/sair.php" id="btn-sair">Sair
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right mb-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</html>