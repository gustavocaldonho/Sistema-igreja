<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Se o link abaixo for descomentado, a navbar nas outras páginas perde a formatação -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style-navbar.css">
    <title>Dropdown menu</title>
</head>

<body>

    <nav>
        <div class="box__navbar">
            <ul id="ul-left">
                <li>
                    <a class="link-dgapy" href="">Dgapy</a>
                </li>
                <li>
                    <a href="../homepage/">Página Inicial</a>
                </li>
                <li class="dropdown">
                    <a href="../comunidades/">Comunidades</a>
                </li>
                <li class="dropdown">
                    <a href="../familias/">Famílias</a>
                </li>
                <li>
                    <a href="../dizimo/">Dízimo</a>
                </li>
                <li>
                    <a href="../caixa-mortuario/">Caixa Mortuário</a>
                </li>
            </ul>

            <!-- Canto direito -> aba de notificações e de login -->
            <ul id="ul-right">
                <li class="dropdown">
                    <a href="">
                        <!-- Sininho das notificações -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
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

                <li class="dropdown">
                    <a href="">Gustavo
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path
                                    d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                            </svg>
                        </span>
                    </a>
                    <!-- O alinhamento a esquerda foi feito por meio da classe drop-left, usando margin-left (negativo) -->
                    <div class="dropdown-menu drop-perfil">
                        <a href="">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a href="">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>

</html>